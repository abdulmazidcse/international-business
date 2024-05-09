<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Country; 
use App\Models\Final_destinations;
use App\Models\Modes_of_carrying;
use App\Models\LoadingPlace;
use App\Models\Port_of_discharged;
use DB;

class LoadingPlacesController extends Controller
{
    public function index()
    {
        $Loading_places = LoadingPlace::all();
        return view('pages.loading-places.index', compact('Loading_places'));
    }

    public function create()
    { 
        return view('pages.loading-places.create');
    }

    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'name' => 'required|string',  
        ]);
        DB::beginTransaction();
        try {
            $customer = new LoadingPlace();
            $customer->name = $validatedData['name'];   
            $customer->save(); 
            DB::commit();
            return redirect()->route('load_places.index')->with('message', 'Successfully done!');
        }catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back();
        } 
    }

    public function edit($id)
    {  
        $loading_places = LoadingPlace::find($id);
        return view('pages.loading-places.edit', compact('loading_places'));
    }

    public function update(Request $request, LoadingPlace $load_places)
    {
        $load_places->name = $request->get('name');   
        $load_places->update($request->all());
        return redirect()->route('load_places.index');
    }

    public function destroy(LoadingPlace $load_place)
    {
        $load_place->delete();
        return redirect()->route('load_places.index');
    }
}
