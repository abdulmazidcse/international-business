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

class LoadingPlacesController extends Controller
{
    public function index()
    {
        $Loading_places = Loading_places::all();
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
            $customer = new Loading_places();
            $customer->name = $validatedData['name'];   
            $customer->save(); 
            DB::commit();
            return redirect()->route('loading-places.index')->with('message', 'Successfully done!');
        }catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back();
        } 
    }

    public function edit($id)
    {  
        $loading_places = Loading_places::find($id);
        return view('pages.loading-places.edit', compact('loading_places'));
    }

    public function update(Request $request, Loading_places $loading_places)
    {
        $loading_places->name = $request->get('name');   
        $loading_places->update($request->all());
        return redirect()->route('loading-places.index');
    }

    public function destroy(Loading_places $loading_places)
    {
        $loading_places->delete();
        return redirect()->route('loading-places.index');
    }
}
