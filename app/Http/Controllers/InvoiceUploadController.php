<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Company;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Final_destinations; 
use App\Models\LoadingPlace; 
use App\Models\ModesOfCarrying;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Port_of_discharged;
use App\Models\SignatureUpload;
use App\Models\CommercialInvoice;
use App\Models\CommercialItem;
use App\Models\Angikarnama;
use App\Models\Terms;
use App\Models\SalesTerm;
use Auth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory; 
use PhpOffice\PhpSpreadsheet\Cell\Cell;  // Import PhpSpreadsheet Cell for calculated values
use PhpOffice\PhpSpreadsheet\Shared\Date; 
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

use App\Helpers\PDFHelper; 
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Mail\OrderShipped;
use App\Mail\HelloWorldMail;
use Mail;
use Log;
class InvoiceUploadController extends Controller
{
    public function index()
    {
        $orderList = Order::with(['customer','company'])->withCount('items')->get();
        // dd( $orderList );
        return view('pages.invoice_upload.index', compact('orderList'));
    }

    public function invoiceDetails($id){
        $orderList = Order::with(['customer','company'])->where('id',$id)->first();
        $orderDetails = OrderItem::where('sale_id',$id)->get();
        $terms = Terms::where('customer_id',$orderList->customer_id)->get();
        return view('pages.invoice_upload.invoiceDetails', compact('orderList','orderDetails','terms'));
    }

    public function scInvoicePrint($id) {
        $orderList = Order::with(['customer','company','country','bank','mode','destination','loading','discharged'])->where('id', $id)->first();
        $orderDetails = OrderItem::where('sale_id', $id)->get();
        $signature = SignatureUpload::where('status', 1)->first();

        $signaturePath = $signature ? storagePath().$signature->signature : '';
        // $signaturePath = $signature ? storage_path($signature->signature) : '';
        $signatureBase64 = '';

        if (file_exists($signaturePath)) {
            $signatureBase64 = base64_encode(file_get_contents($signaturePath));
        }
        
        $data = [
            'title' => 'Sales Contact PDF',
            'orderlist' => $orderList,
            'orderdetails' => $orderDetails,
            'signature' => $signatureBase64,
            'signature_file' => $signaturePath,
        ];

        // Generate the PDF content
        // return view('pages.invoice_upload.sc-invoice-pdf', $data);
        $pdfContent = PDFHelper::generatePDF('pages.invoice_upload.sc-invoice-pdf', $data);

        // Return the PDF as a response
        return Response::make($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Sales-Contact-PDF.pdf"'
        ]);
    }
    public function piGenerate($id) {
        $orderList = Order::where('pi_status', 0)->where('id', $id)->first();
        $orderDetails = OrderItem::where('sale_id', $id)->where('pi_status',0)->get(); 
        // dd($orderList, $orderDetails);
        $data = [
            'title' => 'Proforma Invoice',
            'orderList' => $orderList,
            'orderDetails' => $orderDetails, 
        ]; 
        // Generate the PDF content
        return view('pages.invoice_upload.pi-generate', $data); 
    }
    public function generatePi(Request $request){ 
        $order_id = 0;
        foreach ($request->get('pi-selected') as $key => $value) {
            $orderItem = OrderItem::find($value);
            $orderItem->pi_status = 1;
            $orderItem->update(); 
            $order_id = $orderItem->sale_id;
        };
        $orderDetails = OrderItem::where('sale_id', $order_id)->where('pi_status',0)->first(); 
        if(!$orderDetails){
            $order = Order::find($order_id);
            $order->pi_status = 1;
            $order->update();
        }
        return redirect('/invoice-upload')->with('success', 'PI Generated successfully');
    }
    public function piList(){
        $orderList = Order::whereHas('items', function($query) {
            $query->where('pi_status', 1);
        })->with(['items' => function($query) {
            $query->where('pi_status', 1);
        }])->withCount(['items' => function($query) {
            $query->where('pi_status', 1);
        }])->get(); 
        return view('pages.invoice_upload.pi-list',compact('orderList'));  
    }
    public function piInvoicePrint($id) {
        $orderList = Order::with(['customer','company','country','bank','mode','destination','loading','discharged'])->where('id', $id)->first();
        $orderDetails = OrderItem::where('sale_id', $id)->where('pi_status', 1)->get();
        $signature = SignatureUpload::where('status', 1)->first();

        $signaturePath = $signature ? storagePath().$signature->signature : ''; 
        $signatureBase64 = '';

        if (file_exists($signaturePath)) {
            $signatureBase64 = base64_encode(file_get_contents($signaturePath));
        }
        
        $data = [
            'title' => 'Sales Contact PDF',
            'orderlist' => $orderList,
            'orderdetails' => $orderDetails,
            'signature' => $signatureBase64,
            'signature_file' => $signaturePath,
        ];

        // Generate the PDF content
        // return view('pages.invoice_upload.sc-invoice-pdf', $data);
        $pdfContent = PDFHelper::generatePDF('pages.invoice_upload.pi-invoice-pdf', $data);

        // Return the PDF as a response
        return Response::make($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Sales-Contact-PDF.pdf"'
        ]);
    } 

    public function ciGenerate($id) {
        $orderList = Order::where('id', $id)->first();
        $orderDetails = OrderItem::where('sale_id', $id)->where('pi_status',1)->where('ci_status',0)->get();  
        $data = [
            'title' => 'Commercial Invoice',
            'orderList' => $orderList,
            'orderDetails' => $orderDetails, 
        ]; 
        // Generate the PDF content
        return view('pages.invoice_upload.ci-generate', $data); 
    }

    public function generateCi(Request $request){ 
        $order_id = $request->get('inv'); 
        $orderItem = OrderItem::where('sale_id', $order_id)->update(['ci_status' => 1 ]); 

        $commer = new CommercialInvoice();
        $commer->sale_id = $order_id;
        $commer->exp_no = $request->get('exp_no');
        $commer->submited_date = $request->get('submited_date');
        $commer->note = $request->get('note');
        $commer->save(); 
        $orderDetails = OrderItem::where('sale_id', $order_id)->where('ci_status',1)->get();  
        // dd( $orderItem , $orderDetails,  $commer );
        foreach ($orderDetails as $key => $value) {
            $commercialItem = new CommercialItem(); 
            $commercialItem->commercial_id = $commer->id;
            $commercialItem->order_item_id = $value->id;
            $commercialItem->product_code  = $value->product_code; 
            $commercialItem->description  = $value->description; 
            $commercialItem->hs_code = $value->hs_code; 
            $commercialItem->pcs_per_bunch = $value->pcs_per_bunch  ; 
            $commercialItem->quantity = $value->quantity  ; 
            $commercialItem->total_bunch = $value->total_bunch ; 
            $commercialItem->weight_per_unit = $value->weight_per_unit ; 
            $commercialItem->net_weight = $value->net_weight ; 
            $commercialItem->unit_rate = $value->unit_rate  ; 
            $commercialItem->total_value = $value->total_value  ; 
            $commercialItem->gross_weight = $value->gross_weight  ; 
            $commercialItem->cbm_length = $value->cbm_length  ; 
            $commercialItem->cbm_width = $value->cbm_width  ; 
            $commercialItem->cbm_height = $value->cbm_height ; 
            $commercialItem->carton_cbm = $value->carton_cbm ; 
            $commercialItem->total_cbm = $value->total_cbm; 
            $commercialItem->total_gross_weight = $value->total_gross_weight;
            $commercialItem->save();  
        };
        
        $order = Order::find($order_id);
        $order->ci_status = 1;
        $order->update();

        return redirect()->to('/ci-list')->with('success', 'PI Generated successfully');         
    }

    public function ciList(){
        $orderList = CommercialInvoice::with(['items','order'])->withCount(['items'])->get(); 
        return view('pages.invoice_upload.ci-list',compact('orderList'));  
    }

    public function ciInvoicePrint($id) {
        $orderList = Order::with(['customer','company','country','bank','mode','destination','loading','discharged','commercialInvoice'])->where('id', $id)->first();
        $orderDetails = OrderItem::where('sale_id', $id)->where('ci_status', 1)->get();
        $signature = SignatureUpload::where('status', 1)->first();

        $signaturePath = $signature ? storagePath().$signature->signature : ''; 
        $signatureBase64 = '';

        if (file_exists($signaturePath)) {
            $signatureBase64 = base64_encode(file_get_contents($signaturePath));
        }
        
        $data = [
            'title' => 'Sales Contact PDF',
            'orderlist' => $orderList,
            'orderdetails' => $orderDetails,
            'signature' => $signatureBase64,
            'signature_file' => $signaturePath,
        ];

        // Generate the PDF content
        // return view('pages.invoice_upload.sc-invoice-pdf', $data);
        $pdfContent = PDFHelper::generatePDF('pages.invoice_upload.ci-invoice-pdf', $data);

        // Return the PDF as a response
        return Response::make($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Sales-Contact-PDF.pdf"'
        ]);
    }

    public function pwGenerate($id) {
        CommercialInvoice::where('id', $id)->update(['pw_status'=>1]);
        CommercialItem::where('commercial_id', $id)->update(['pw_status'=>1]); 
        return redirect()->to('/pw-list')->with('success', 'Packing & Weight Generated successfully');     
        // $orderItem = OrderItem::where('sale_id', $order_id)->update(['ci_status' => 1 ]); 
        // $data = [
        //     'title' => 'Commercial Invoice',
        //     'orderList' => $orderList,
        //     'orderDetails' => $orderDetails, 
        // ]; 
        // // Generate the PDF content
        // return view('pages.invoice_upload.pw-generate', $data); 
    }
    public function generatePw(Request $request){ 
        $order_id = $request->get('inv');
        // foreach ($request->get('pi-selected') as $key => $value) {
        $orderItem = OrderItem::where('sale_id', $order_id)->update(['ci_status' => 1 ]); 

        $commer = new CommercialInvoice();
        $commer->sale_id = $order_id;
        $commer->exp_no = $request->get('exp_no');
        $commer->submited_date = $request->get('submited_date');
        $commer->note = $request->get('note');
        $commer->save();
        // };
        $orderDetails = OrderItem::where('sale_id', $order_id)->where('ci_status',0)->first();  
        if(!$orderDetails){ 
            $order = Order::find($order_id);
            $order->ci_status = 1;
            $order->update();
        }
        return redirect()->back()->with('success', 'PI Generated successfully');
    }
    public function pwList(){ 
        $orderList = CommercialInvoice::whereHas('items', function($query) {
            $query->where('pw_status', 1);
        })->with(['items' => function($query) {
            $query->where('pw_status', 1);
        }])->withCount(['items' => function($query) {
            $query->where('pw_status', 1);
        }])->get(); 
        return view('pages.invoice_upload.pw-list',compact('orderList'));  
    }
    public function pwInvoicePrint($id) {
        $orderList = Order::with(['customer','company','country','bank','mode','destination','loading','discharged','commercialInvoice'])->where('id', $id)->first();
        $orderDetails = OrderItem::where('sale_id', $id)->where('ci_status', 1)->get();
        $signature = SignatureUpload::where('status', 1)->first();

        $signaturePath = $signature ? storagePath().$signature->signature : ''; 
        $signatureBase64 = '';

        if (file_exists($signaturePath)) {
            $signatureBase64 = base64_encode(file_get_contents($signaturePath));
        }
        
        $data = [
            'title' => 'Sales Contact PDF',
            'orderlist' => $orderList,
            'orderdetails' => $orderDetails,
            'signature' => $signatureBase64,
            'signature_file' => $signaturePath,
        ];

        // Generate the PDF content
        // return view('pages.invoice_upload.sc-invoice-pdf', $data);
        $pdfContent = PDFHelper::generatePDF('pages.invoice_upload.pw-invoice-pdf', $data);

        // Return the PDF as a response
        return Response::make($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Sales-Contact-PDF.pdf"'
        ]);
    }



    public function trGenerate($id) {
        CommercialInvoice::where('id', $id)->update(['tr_status'=>1]);
        CommercialItem::where('commercial_id', $id)->update(['tr_status'=>1]); 
        return redirect()->to('/tr-list')->with('success', 'PI Generated successfully');  
        // $orderList = Order::where('ci_status', 0)->where('id', $id)->first();
        // $orderDetails = OrderItem::where('sale_id', $id)->where('pi_status',1)->where('tr_status',0)->get();  
        // $data = [
        //     'title' => 'Commercial Invoice',
        //     'orderList' => $orderList,
        //     'orderDetails' => $orderDetails, 
        // ]; 
        // // Generate the PDF content
        // return view('pages.invoice_upload.tr-generate', $data); 
    }
    public function generateTr(Request $request){ 
        $order_id = $request->get('inv');
        // foreach ($request->get('pi-selected') as $key => $value) {
        $orderItem = OrderItem::where('sale_id', $order_id)->update(['tr_status' => 1 ]); 

        $commer = new CommercialInvoice();
        $commer->sale_id = $order_id;
        $commer->exp_no = $request->get('exp_no');
        $commer->submited_date = $request->get('submited_date');
        $commer->note = $request->get('note');
        $commer->save();
        // };
        $orderDetails = OrderItem::where('sale_id', $order_id)->where('tr_status',0)->first();  
        if(!$orderDetails){ 
            $order = Order::find($order_id);
            $order->tr_status = 1;
            $order->update();
        }
        return redirect()->back()->with('success', 'PI Generated successfully');
    }
    public function trList(){
        $orderList = CommercialInvoice::whereHas('items', function($query) {
            $query->where('tr_status', 1);
        })->with(['items' => function($query) {
            $query->where('tr_status', 1);
        }])->withCount(['items' => function($query) {
            $query->where('tr_status', 1);
        }])->get();
        return view('pages.invoice_upload.tr-list',compact('orderList'));  
    }
    public function trInvoicePrint($id) {
        $orderList = CommercialInvoice::with(['order.customer','order.company','order.country','order.bank','order.mode','order.destination','order.loading','order.discharged'])
        ->where('id', $id)->first(); 
        $orderDetails = CommercialItem::where('commercial_id', $id)->where('tr_status', 1)->get();
        // $netWeight = CommercialItem::where('commercial_id', $id)->where('tr_status', 1)->sum('net_weight');
        // $totalBunch = CommercialItem::where('commercial_id', $id)->where('tr_status', 1)->sum('total_bunch');
        $signature = SignatureUpload::where('status', 1)->first();

        $signaturePath = $signature ? storagePath().$signature->signature : ''; 
        $signatureBase64 = '';

        if (file_exists($signaturePath)) {
            $signatureBase64 = base64_encode(file_get_contents($signaturePath));
        }
        
        $data = [
            'title' => 'Sales Contact PDF',
            'orderlist' => $orderList,
            'orderDetails' => $orderDetails,
            'signature' => $signatureBase64,
            'signature_file' => $signaturePath,
        ];

        // Generate the PDF content
        // return view('pages.invoice_upload.tr-invoice-pdf', $data);
        $pdfContent = PDFHelper::generatePDF('pages.invoice_upload.tr-invoice-pdf', $data);

        // Return the PDF as a response
        return Response::make($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Sales-Contact-PDF.pdf"'
        ]);
    }
    
    
    
    public function angikarnamaGenerate($id) { 
        $orderList = CommercialInvoice::where('angikarnama_status', 0)->where('id', $id)->first();
        $orderDetails = CommercialItem::where('commercial_id', $id)->where('angikarnama_status',0)->get();  
        $data = [
            'title' => 'Angikarnama',
            'orderList' => $orderList,
            'orderDetails' => $orderDetails, 
        ]; 
        // Generate the PDF content
        return view('pages.invoice_upload.angikarnama-generate', $data); 
    }
    public function generateAngikarnama(Request $request){ 
        $order_id = $request->get('inv'); 
        CommercialInvoice::where('id', $order_id)->update(['angikarnama_status' => 1 ]);  
        $order = CommercialInvoice::where('id', $order_id)->first(); 

        $commer = new Angikarnama();  
        $commer->sale_id = $order_id;
        $commer->commercial_id = $order->id;
        $commer->tr_id = $order_id;
        $commer->name = $request->get('name');
        $commer->designation = $request->get('designation');
        $commer->submited_date = $request->get('submited_date');
        $commer->note = $request->get('note');
        $commer->save();  
        if($order){ 
            $order = Order::find($order->sale_id);
            $order->tr_status = 1;
            $order->update();
        }
        return redirect()->to('/angikarnama-list')->with('success', 'Angikarnama Generated successfully');
    }
    public function angikarnamaList(){
        $orderList = CommercialInvoice::whereHas('items', function($query) {
            $query->where('tr_status', 1);
        })->with(['items' => function($query) {
            $query->where('tr_status', 1);
        }])->withCount(['items' => function($query) {
            $query->where('tr_status', 1);
        }])
        ->where('angikarnama_status', 1)->get();
        return view('pages.invoice_upload.angikarnama-list',compact('orderList'));  
    } 
    public function angikarnamaPrint($id) {
        
        $order = CommercialInvoice::with(['angikarnama','order.company','order.country','order.bank'])
        ->where('id', $id)->where('angikarnama_status', 1)->first();
        $orderDetails = OrderItem::where('sale_id', $order->sale_id)->first();
        $orderDetailsSum = OrderItem::where('sale_id', $order->sale_id)->sum('net_weight');
        $signature = SignatureUpload::where('status', 1)->first();

        $signaturePath = $signature ? storagePath().$signature->signature : ''; 
        $signatureBase64 = '';

        if (file_exists($signaturePath)) {
            $signatureBase64 = base64_encode(file_get_contents($signaturePath));
        } 
        $data = [
            'title' => 'Angikarnama PDF',
            'order' => $order,
            'orderdetails' => $orderDetails,
            'orderdetails_sum' => $orderDetailsSum,
            'signature' => $signatureBase64,
            'signature_file' => $signaturePath,
        ];

        // Generate the PDF content
        return view('pages.invoice_upload.angikarnama-print-pdf', $data);
        // $pdfContent = PDFHelper::generatePDF('pages.invoice_upload.angikarnama-print-pdf', $data);

        // Return the PDF as a response
        // return Response::make($pdfContent, 200, [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' => 'inline; filename="Sales-Contact-PDF.pdf"'
        // ]);
    }



    public function create()
    {
        $exporter = Company::get();
        $importer = Customer::get();
        $country = Country::get();
        $bank = Bank::get();
        $destinations = Final_destinations::get();
        $modes = ModesOfCarrying::get();
        $loading_places = LoadingPlace::get();
        $discharged = Port_of_discharged::get();
        $salesTerms = SalesTerm::get();
        return view('pages/invoice_upload/create', compact('exporter', 'importer', 'country', 'bank', 'destinations', 'modes', 'loading_places','discharged','salesTerms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
            'sales_contact' => 'required',
        ]);

        $file = $request->file('file');
        $data = Excel::toArray('', $file);
        $saleItemsInsert = [];

        // dd($data);

        $sale_id = Order::insertGetId(
            [
                'invoice_number' => $request->sales_contact,
                'sales_term' => $request->sales_term,
                'customer_id' => $request->importer,
                'country_id' => $request->country,
                'order_date' => $request->order_date ?? date('Y-m-d'),
                'exporter_id' => $request->exporter,
                'bank_id' => $request->bank,
                'importer_iec_no' => $request->importer_iec_no,
                'pan_number' => $request->pan_no,
                'port_discharge_id' => $request->port_discharge_id,
                'final_destination_id' => $request->destination,
                'loading_place_id' => $request->loading_place,
                'mode_carrying_id' => $request->mode_of_carrying, 
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => Auth::user()->id,
            ]
        ); 

        $saleItemsInsert = self::uploadSalesOrder($request, $sale_id );

        if (!empty($saleItemsInsert)) {
            OrderItem::insert($saleItemsInsert);
            return redirect()->back()->with('success', 'Order processed successfully');
        } else {
            return redirect()->back()->with('error', 'Excel file something missing!');
        }

    }

    public function uploadSalesOrder(Request $request,  $sale_id){
        $file = $request->file('file');  // Get the uploaded file

        // Load the Excel file
        $spreadsheet = IOFactory::load($file->getPathName());

        // Load the first worksheet (assuming the data is in the first sheet)
        $worksheet = $spreadsheet->getActiveSheet();
        $saleItemsInsert = []; 

        foreach ($worksheet->getRowIterator() as $rowIndex => $row) {
            if ($rowIndex == 1) {
                continue;  // Skip header row
            }

            // Get values from the respective columns (assuming your data starts from the second row)
            $product_code = $worksheet->getCell(Coordinate::stringFromColumnIndex(2) . $rowIndex)->getValue();  // B
            $description = $worksheet->getCell(Coordinate::stringFromColumnIndex(3) . $rowIndex)->getValue();   // C
            $hs_code = $worksheet->getCell(Coordinate::stringFromColumnIndex(4) . $rowIndex)->getValue();       // D
            $pcs_per_bunch = $worksheet->getCell(Coordinate::stringFromColumnIndex(5) . $rowIndex)->getValue(); // E
            $total_bunch = $worksheet->getCell(Coordinate::stringFromColumnIndex(7) . $rowIndex)->getValue();   // G
            $weight_per_unit = $worksheet->getCell(Coordinate::stringFromColumnIndex(8) . $rowIndex)->getValue();  // H

            // Calculate values if necessary
            //$quantity = $total_bunch * $pcs_per_bunch;  // Assuming you want to calculate this value

            // Fetch calculated values (e.g., H2 * E2)
            $quantity = $worksheet->getCell(Coordinate::stringFromColumnIndex(6) . $rowIndex)->getCalculatedValue(); // I
            $net_weight = $worksheet->getCell(Coordinate::stringFromColumnIndex(9) . $rowIndex)->getCalculatedValue(); // I
            $unit_rate = $worksheet->getCell(Coordinate::stringFromColumnIndex(10) . $rowIndex)->getCalculatedValue(); // J
            $total_value = $worksheet->getCell(Coordinate::stringFromColumnIndex(11) . $rowIndex)->getCalculatedValue(); // K

            // Add the processed data to an array for bulk insertion
            if($product_code){
                $saleItemsInsert[] = [
                    'sale_id'           => $sale_id,
                    'product_code'      => $product_code,
                    'description'       => $description,
                    'hs_code'           => $hs_code,
                    'pcs_per_bunch'     => $pcs_per_bunch,
                    'quantity'          => $quantity,            // G2 * E2 (manually calculated)
                    'total_bunch'       => $total_bunch,
                    'weight_per_unit'   => $weight_per_unit,
                    'net_weight'        => $net_weight,          // Calculated value from Excel (H2 * F2)
                    'unit_rate'         => $unit_rate,           // Calculated value
                    'total_value'       => $total_value,         // Calculated value from Excel (J2 * F2)
                    'gross_weight'      => $worksheet->getCell(Coordinate::stringFromColumnIndex(12) . $rowIndex)->getValue(), // L
                    'cbm_length'        => $worksheet->getCell(Coordinate::stringFromColumnIndex(14) . $rowIndex)->getValue(), // N
                    'cbm_width'         => $worksheet->getCell(Coordinate::stringFromColumnIndex(15) . $rowIndex)->getValue(), // O
                    'cbm_height'        => $worksheet->getCell(Coordinate::stringFromColumnIndex(16) . $rowIndex)->getValue(), // P
                    'carton_cbm'        => $worksheet->getCell(Coordinate::stringFromColumnIndex(18) . $rowIndex)->getCalculatedValue(), // R
                    'total_cbm'         => $worksheet->getCell(Coordinate::stringFromColumnIndex(19) . $rowIndex)->getCalculatedValue(), // S
                    'total_gross_weight'=> $worksheet->getCell(Coordinate::stringFromColumnIndex(20) . $rowIndex)->getValue() // T                   
                ];
            }
        } 
        return $saleItemsInsert; 
    }

    public function destroy(Order $invoice_upload)
    {
        $invoice_upload->delete();
        return redirect()->route('invoice-upload.index');
    }

    public function testMail($orderId) {

        try {
            Mail::to('abdulmazidcse@gmail.com')->send(new HelloWorldMail());
            return response()->json(['message' => 'Email sent successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send email. ' . $e->getMessage()], 500);
        }

        // $order = Order::find($orderId); 
    
        // if (!$order) {
        //     return response()->json(['error' => 'Order not found.'], 404);
        // }  
    
        // try { 
        //     if (empty('abdulmazidcse@gmail.com') || empty($order)) {
        //         return response()->json(['error' => 'Order is missing required information.'], 400);
        //     }
    
        //     Mail::to('abdulmazidcse@gmail.com')->send(new OrderShipped($order));
        //     return response()->json(['message' => 'Order shipped email sent successfully.']);
        // } catch (\Exception $e) {  
        //     Log::error('Failed to send email: ' . $e->getMessage());
        //     Log::error('Order data: ', $order->toArray());
        //     return response()->json(['error' => 'Failed to send email. ' . $e->getMessage()], 500);
        // }
    }

    public function sendHelloWorldEmail(){
        try {
            Mail::to('recipient@example.com')->send(new HelloWorldMail());
            return response()->json(['message' => 'Email sent successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send email. ' . $e->getMessage()], 500);
        }
    }
    
    
}
