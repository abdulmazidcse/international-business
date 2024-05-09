<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Port_of_discharged;
use DB;
class PortDischargedController extends Controller
{
    public function index()
    {
        $ports = Port_of_discharged::all();
        return view('pages.port-discharged.index', compact('ports'));
    }

    public function create()
    { 
        return view('pages.port-discharged.create');
    }

    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'name' => 'required|string',  
        ]);
        DB::beginTransaction();
        try {
            $customer = new Port_of_discharged();
            $customer->name = $validatedData['name'];   
            $customer->save(); 
            DB::commit();
            return redirect()->route('port-discharged.index')->with('message', 'Successfully done!');
        }catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back();
        } 
    }

    public function edit($id)
    {  
        $ports = Port_of_discharged::find($id);
        return view('pages.port-discharged.edit', compact('ports'));
    }

    public function update(Request $request,  $id)
    {
        $port_of_discharged = Port_of_discharged::find($id);
        $port_of_discharged->name = $request->get('name');   
        $port_of_discharged->update($request->all());
        return redirect()->route('port-discharged.index');
    }

    public function destroy($id) 
    {
        $port_of_discharged = Port_of_discharged::find($id);
        $port_of_discharged->delete();
        return redirect()->route('port-discharged.index');
    }
}
