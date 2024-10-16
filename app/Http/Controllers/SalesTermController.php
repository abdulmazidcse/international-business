<?php

namespace App\Http\Controllers;

use App\Models\SalesTerm;
use App\Http\Requests\StoreSalesTermRequest;
use App\Http\Requests\UpdateSalesTermRequest;

class SalesTermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales_term = SalesTerm::all();
        return view('pages.sales-term.index', compact('sales_term'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.sales-term.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSalesTermRequest $request)
    {
        // The request is already validated, so we can access the validated data
        $validatedData = $request->validated();

        // Assuming you have a SalesTerm model to handle the data
        $salesTerm = SalesTerm::create($validatedData);

        // Return a response, such as a redirect or a JSON response
        return redirect()->route('sales-term.index')->with('success', 'Sales term created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SalesTerm $salesTerm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalesTerm $salesTerm)
    { 
        return view('pages.sales-term.edit', compact('salesTerm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSalesTermRequest $request, SalesTerm $salesTerm)
    {
        $validatedData = $request->validated();

        // Update the sales term with the validated data
        $salesTerm->update($validatedData);

        // Return a response, such as a redirect or a JSON response
        return redirect()->route('sales-term.index')->with('success', 'Sales term updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalesTerm $salesTerm)
    {
        $salesTerm->delete();
        return redirect()->route('sales-term.index');
    }
}
