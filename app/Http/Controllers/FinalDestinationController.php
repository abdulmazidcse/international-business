<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Final_destinations;
use DB;
class FinalDestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Final_destinations::all();
        return view('pages.destinations.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $destinations = Final_destinations::all();
        return view('pages.destinations.create', compact('destinations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string' 
        ]);
        DB::beginTransaction();
        try {
            $destination = new Final_destinations();
            $destination->name = $validatedData['name']; 
            $destination->save(); 
            DB::commit();
            return redirect()->route('destinations.index')->with('message', 'Successfully done!');
        }catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back();
        } 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {   
        $destinations = Final_destinations::find($id);
        return view('pages.destinations.edit', compact('destinations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $destinations = Final_destinations::find($id); 
        $destinations->name  = $request->get('name');  
        $destinations->update();
        return redirect()->route('destinations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $destinations = Final_destinations::find($id);
        $destinations->delete();
        return redirect()->route('destinations.index');
    }
}
