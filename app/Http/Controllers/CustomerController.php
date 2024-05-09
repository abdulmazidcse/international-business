<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Country; 
use App\Models\Final_destinations;
use App\Models\Modes_of_carrying;
use App\Models\Loading_places;
use App\Models\Port_of_discharged;
use DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('pages.customer.index', compact('customers'));
    }

    public function create()
    {
        $country = Country::get(); 
        $destinations = Final_destinations::get();
        $modes = Modes_of_carrying::get();
        $loading_places = Loading_places::get();
        $discharged = Port_of_discharged::get();
        return view('pages.customer.create', compact('country','destinations','modes','loading_places','discharged'));
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
        $modes = Modes_of_carrying::get();
        $loading_places = Loading_places::get();
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
