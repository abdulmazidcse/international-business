<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::all();
        return view('pages.banks.index', compact('banks'));
    }

    public function create()
    {
        return view('pages.banks.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'account_no' => 'required|string',
        ]);

        $bank = new Bank(); // Replace division with the actual model you are using
        $bank->name = $validatedData['name']; 
        $bank->account_no = $validatedData['account_no'];
        $bank->branch = $request->get('branch');
        $bank->address = $request->get('address');
        $bank->swift_code = $request->get('swift_code');
        $bank->status = $request->get('status');
        $bank->country_id = 18;
        $bank->save();
        // Bank::create($request->all());
        return redirect()->route('banks.index');
    }

    public function edit(Bank $bank)
    {
        return view('pages.banks.edit', compact('bank'));
    }

    public function update(Request $request, Bank $bank)
    {
        $bank->update($request->all());
        return redirect()->route('banks.index');
    }

    public function destroy(Bank $bank)
    {
        $bank->delete();
        return redirect()->route('banks.index');
    }
}
