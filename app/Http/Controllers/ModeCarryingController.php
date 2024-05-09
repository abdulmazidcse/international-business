<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modes_of_carrying;
use DB;

class ModeCarryingController extends Controller
{
    public function index()
    {
        $modes = Modes_of_carrying::all();
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
            $customer = new Modes_of_carrying();
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
        $modes = Modes_of_carrying::find($id);
        return view('pages.modes-carrying.edit', compact('modes'));
    }

    public function update(Request $request,  $id)
    {
        $Modes_of_carrying = Modes_of_carrying::find($id);
        $Modes_of_carrying->name = $request->get('name');   
        $Modes_of_carrying->update($request->all());
        return redirect()->route('mode-carrying.index');
    }

    public function destroy($id) 
    {
        $Modes_of_carrying = Modes_of_carrying::find($id);
        $Modes_of_carrying->delete();
        return redirect()->route('mode-carrying.index');
    }
}
