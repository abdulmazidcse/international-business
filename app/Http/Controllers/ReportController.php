<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem; 
use App\Models\Final_destinations;
use App\Models\ModesOfCarrying;
use App\Models\LoadingPlace;
use App\Models\Port_of_discharged;
use DB; 
use Carbon\Carbon;
class ReportController extends Controller
{
    public function topSheet(Request $request)
    {         
        // $reports = Order::select(
        //     DB::raw("DATE_FORMAT(order_date, '%b') as month"),
        //     DB::raw("SUM(total) as order_value"),
        //     DB::raw("SUM(total) as delivery"),
        //     DB::raw("SUM(total) as collection"),
        //     DB::raw("SUM(total) as lc_tt_in_hand")
        // )
        // ->groupBy('month') 
        // ->orderByRaw("MIN(order_date)")
        // ->get(); 

         // Define the start and end dates
        $start_date = '2023-07-01';
        $end_date = '2024-06-30';

        // Query to fetch data grouped by year and month
        $values = DB::table('order_items')
            ->selectRaw('YEAR(updated_at) as year, MONTH(updated_at) as month, SUM(total_value) as order_value, SUM(total_value) as total_value,
             SUM(total_value) as delivery, SUM(total_value) as collection, SUM(total_value) as lc_tt_in_hand')
            ->whereBetween('updated_at', [$start_date, $end_date])
            ->groupBy(DB::raw('YEAR(updated_at), MONTH(updated_at)'))
            ->orderBy(DB::raw('YEAR(updated_at), MONTH(updated_at)'))
            ->get();

        // Prepare an array to hold the final results
        $final_results = [];

        // Loop through each month in the specified range 
        $current_date = Carbon::parse($start_date);
        $end_date_obj = Carbon::parse($end_date);

        while ($current_date <= $end_date_obj) {
            $year = $current_date->format('Y');
            $month = $current_date->format('m');

            // Check if there is data for the current month in $values
            $result = $values->first(function ($value) use ($year, $month) {
                return $value->year == $year && $value->month == $month;
            });

            // If data exists, use it; otherwise, set total_value to 0
            if ($result) {
                $final_results[] = [
                    'year' => $result->year,
                    'month' => Carbon::create()->month($result->month)->startOfMonth()->format('M'),
                    'sales_value' => $result->total_value,
                    'delivery' => $result->delivery,
                    'collection' => $result->collection,
                    'lc_tt_in_hand' => $result->lc_tt_in_hand,
                ];
            } else {
                $final_results[] = [
                    'year' => $year,
                    'month' => Carbon::create()->month($month)->startOfMonth()->format('M'),
                    'sales_value' => 0,
                    'delivery' => 0,
                    'collection' => 0,
                    'lc_tt_in_hand' => 0,
                ];
            }

            // Move to the next month
            $current_date->modify('+1 month');
        }

        // $final_results now contains all months in the range with their respective total values or 0 if no data exists

        $reports = $final_results;


        return view('report.top-sheet', compact('reports'));
    } 

    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'name' => 'required|string', 
            'phone_number' => 'required', 
            'terms_and_conditions' => 'required', 
            'payment_terms' => 'required', 
            'country_id' => 'required', 
            'mode_of_carrying' => 'required', 
            'port_discharge' => 'required', 
            'final_destination' => 'required', 
            'loading_place' => 'required', 
        ]);
        DB::beginTransaction();
        try {
            $customer = new Customer();
            $customer->name = $validatedData['name'];  
            $customer->phone_number = $request->get('phone_number');
            $customer->address = $request->get('address');
            $customer->terms_and_conditions = $request->get('terms_and_conditions');
            $customer->payment_terms = $request->get('payment_terms');
            $customer->country_id  = $request->get('country_id');
            $customer->mode_carrying_id  = $request->get('mode_of_carrying');
            $customer->port_discharge_id  = $request->get('port_discharge');
            $customer->final_destination_id  = $request->get('final_destination');
            $customer->loading_place_id  = $request->get('loading_place');
            $customer->save(); 
            DB::commit();
            return redirect()->route('customer.index')->with('message', 'Successfully done!');
        }catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back();
        } 
    }

    public function edit(Customer $customer)
    { 
        $country = Country::get(); 
        $destinations = Final_destinations::get();
        $modes = ModesOfCarrying::get();
        $loading_places = LoadingPlace::get();
        $discharged = Port_of_discharged::get();
        return view('pages.customer.edit', compact('customer', 'country','destinations','modes','loading_places','discharged'));
    }

    public function update(Request $request, Customer $customer)
    {
        $customer->name = $request->get('name');  
        $customer->phone_number = $request->get('phone_number');
        $customer->address = $request->get('address');
        $customer->terms_and_conditions = $request->get('terms_and_conditions');
        $customer->payment_terms = $request->get('payment_terms');
        $customer->country_id  = $request->get('country_id');
        $customer->mode_carrying_id  = $request->get('mode_of_carrying');
        $customer->port_discharge_id  = $request->get('port_discharge');
        $customer->final_destination_id  = $request->get('final_destination');
        $customer->loading_place_id  = $request->get('loading_place');
        $customer->update($request->all());
        return redirect()->route('customer.index');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index');
    }
}
