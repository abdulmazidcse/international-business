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
use App\Models\Terms;
use Auth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Helpers\PDFHelper; 
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class InvoiceUploadController extends Controller
{
    public function index()
    {
        $orderList = Order::all();
        return view('pages.invoice_upload.index', compact('orderList'));
    }

    public function invoiceDetails($id){
        $orderList = Order::with(['customer','company'])->where('id',$id)->first();
        $orderDetails = OrderItem::where('sale_id',$id)->get();
        $terms = Terms::where('customer_id',$orderList->customer_id)->get();
        return view('pages.invoice_upload.invoiceDetails', compact('orderList','orderDetails','terms'));
    }

    public function poInvoicePrint($id) {
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

    public function poInvoicePrintOld($id)  {
        $orderList = Order::with(['customer','company','country','bank','mode','destination','loading','discharged'])->where('id',$id)->first(); 
        $orderDetails = OrderItem::where('sale_id',$id)->get(); 
        $signature = SignatureUpload::where('status', 1)->first();

        $signaturePath = $signature ? storage_path('app/public/' . $signature->signature) : '';
        $signatureBase64 = '';

        if (file_exists($signaturePath)) {
            $signatureBase64 = base64_encode(file_get_contents($signaturePath));
        }

        $data = [
            'title' => 'Sales Contact PDF',
            'orderlist' => $orderList,
            'orderdetails' => $orderDetails,
            'signature' => $signatureBase64,
        ];
        // Temporarily return the view to check HTML
        return view('pages.invoice_upload.sc-invoice-pdf', $data);

        // Generate the PDF content
        $pdfContent = PDFHelper::generatePDF('pages.invoice_upload.sc-invoice-pdf', $data);

        // Return the PDF as a response
        return Response::make($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Sales-Contact-PDF.pdf"'
        ]);
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
        return view('pages/invoice_upload/create', compact('exporter', 'importer', 'country', 'bank', 'destinations', 'modes', 'loading_places','discharged'));
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
        if (!empty($data)) {
            $data = $data[0]; 

            for ($i = 0; $i < count($data); $i++) {
                if ($i == 0) {
                    continue;
                } 
               // $product_id = Product::where('sap_code', $data[$i]['product_code'])->first()->id; 
                $quantity = $data[$i][6] * $data[$i][4];
                $net_weight = $data[$i][7] * $quantity;
                $total_value = $data[$i][9] * $quantity; 
                $carton_cbm = (( $data[$i][13] * $data[$i][14] * $data[$i][15]) / $data[$i][16]);
                $total_cbm = $carton_cbm * $data[$i][6];
                $saleItemsInsert[] =
                    [
                        'sale_id'           => $sale_id,             // A
                        'product_code'      => $data[$i][1],  // B
                        'description'       => $data[$i][2],  // C 
                        'hs_code'           => $data[$i][3],  // D
                        'pcs_per_bunch'     => $data[$i][4],  // E
                        'quantity'          => $quantity,     // F  // G2*E2
                        'total_bunch'       => $data[$i][6],  // G
                        'weight_per_unit'   => $data[$i][7],  // H
                        'net_weight'        => $net_weight,   // I   //H2*F2  
                        'unit_rate'         => $data[$i][9],  // J
                        'total_value'       => $total_value,  // k J2*F2
                        'gross_weight'      => $data[$i][11], // L
                        // ''               => $data[$i][12], // M
                        'cbm_length'        => $data[$i][13], // N
                        'cbm_width'         => $data[$i][14], // O
                        'cbm_height'        => $data[$i][15], // P
                        // ''               => $data[$i][16], // Q
                        'carton_cbm'        => $carton_cbm,   // R  N2*O2*P2/Q2
                        'total_cbm'         => $total_cbm,    // S  // R2*G2
                        'total_gross_weight'=> $data[$i][19]  // T                   
                    ];

            }
            // dd($saleItemsInsert); 
        }
        

        if (!empty($saleItemsInsert)) {
            OrderItem::insert($saleItemsInsert);
            return redirect()->back()->with('success', 'Order processed successfully');
        } else {
            return redirect()->back()->with('error', 'Excel file something missing!');
        }

        // dd($data);

        // Get the first worksheet
        /* $worksheet = $spreadsheet->getActiveSheet();

    // Iterate through rows
    foreach ($worksheet->getRowIterator() as $row) {
    // Process each cell in the row
    foreach ($row->getCellIterator() as $cell) {
    $column = $cell->getColumn();
    $value = $cell->getValue();
    dd($column,$value );

    // Perform your custom logic here
    // You can access $column and $value to process specific columns and cell values
    }
    }  */

    }
}
