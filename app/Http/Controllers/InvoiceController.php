<?php

namespace App\Http\Controllers;

use App\invoice;
use Illuminate\Http\Request;
use App\Company;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = invoice::all();

        return view('invoices/index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all()->pluck('title', 'id');
        return view('invoices/create', compact('companies'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $validatedData = $request->validate([

            'date' => 'required',
            'number' => 'required',
            'summ_1' => 'required',
            'company_id' => 'required',

            ]);
        $invoice = Invoice::create($validatedData);
        //dd($validatedData);
        return redirect('admin/invoices')->with('success', 'Рахунок збережений');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        $companies = Company::all()->pluck('title', 'id');

        return view('invoices/edit', compact('invoice', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([

            // 'date' => 'date_format:"Y-m-d"|required',
            'date' => 'required',
            'number' => 'required',
            'summ_1' => 'required',
            'company_id' => 'required',

            ]);

           //dd($validatedData);
           Invoice::whereId($id)->update($validatedData);
        return redirect('admin/invoices')->with('success', 'Рахунок '. $request -> number. ' відновлен.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect('admin/invoices')->with('success', 'Рахунок '. $invoice -> number. ' видалений');
    }
}
