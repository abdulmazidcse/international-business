<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModesOfCarrying;
use DB;

class ModeCarryingController extends Controller
{
    public function index()
    {
        $modes = ModesOfCarrying::all();
        return view('pages.modes-carrying.index', compact('modes'));
    }

    public function create()
    { 
        return view('pages.modes-carrying.create');
    }

    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'name' => 'required|string',  
        ]);
        DB::beginTransaction();
        try {
            $customer = new ModesOfCarrying();
            $customer->name = $validatedData['name'];   
            $customer->save(); 
            DB::commit();
            return redirect()->route('mode-carrying.index')->with('message', 'Successfully done!');
        }catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back();
        } 
    }

    public function edit($id)
    {  
        $modes = ModesOfCarrying::find($id);
        return view('pages.modes-carrying.edit', compact('modes'));
    }

    public function update(Request $request,  $id)
    {
        $ModesOfCarrying = ModesOfCarrying::find($id);
        $ModesOfCarrying->name = $request->get('name');   
        $ModesOfCarrying->update($request->all());
        return redirect()->route('mode-carrying.index');
    }

    public function destroy(ModesOfCarrying  $modes_of_carrying) 
    { 
        $modes_of_carrying->delete();
        return redirect()->route('modes_of_carrying.index');
    }
}
