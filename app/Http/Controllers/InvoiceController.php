<?php

namespace App\Http\Controllers;

use App\invoice;
use Illuminate\Http\Request;
use App\Company;

class InvoiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = invoice::all();

        return view('admin/invoices/index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all()->pluck('title', 'id');
        return view('admin/invoices/create', compact('companies'));
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

            'company_id' => 'required',
            'date' => 'required',
            'date_end' => 'required',
            'number' => 'required',

            'balance_start' => 'required',
            'consumption_volume' => 'required',
            'tariff_estimated' => 'required',
            'tariff_transmission' => 'required',
            'tariff_distribution' => 'required',
            'consumption_cost' => 'required',
            'paid_summ' => 'required',
            'consumption_actual' => 'required',
            'cost_actual' => 'required',
            'balance_end' => 'required',

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

        return view('admin/invoices/edit', compact('invoice', 'companies'));
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
            'company_id' => 'required',
            'date' => 'required',
            'date_end' => 'required',
            'number' => 'required',

            'balance_start' => 'required',
            'consumption_volume' => 'required',
            'tariff_estimated' => 'required',
            'tariff_transmission' => 'required',
            'tariff_distribution' => 'required',
            'consumption_cost' => 'required',
            'paid_summ' => 'required',
            'consumption_actual' => 'required',
            'cost_actual' => 'required',
            'balance_end' => 'required',

        ]);

        //dd($validatedData);
        Invoice::whereId($id)->update($validatedData);
        return redirect('admin/invoices')->with('success', 'Рахунок ' . $request->number . ' відновлен.');
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

        return redirect('admin/invoices')->with('success', 'Рахунок ' . $invoice->number . ' видалений');
    }
}
