<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Load;
use App\InvoiceHeader;
use App\Farm;
use App\Client;
use App\ComercialInvoiceItem;
use App\Pallet;
use Barryvdh\DomPDF\Facade as PDF;

class InvoiceHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Codigo
        $url= $_SERVER["REQUEST_URI"];
        $div = explode("?", $url);
        $code = $div[1];
        // Load
        $load_code = Load::where('code', '=', $code)->get();
        $load = $load_code[0]->id;
        // BL N°
        $bl = InvoiceHeader::where('id_load', '=', $load)->select('bl')->get()->last();
        $bl = ($bl) ? $bl->bl : null;
        // Invoice N°
        $invoice_n = InvoiceHeader::where('id_load', '=', $load)->select('invoice')->get()->last();
        $invoice_n = ($invoice_n) ? $invoice_n->invoice : null;
        // Carrier
        $carrier = InvoiceHeader::where('id_load', '=', $load)->select('carrier')->get()->last();
        $carrier = ($carrier) ? $carrier->carrier : null;
        // Fecha
        $date_load = $load_code[0]->date;
        // Crear o editar
        $id_invoice = InvoiceHeader::where('id_load', '=', $load)->select('id')->get()->last();
        $id_invoice = ($id_invoice) ? $id_invoice->id : null;
        // Fincas
        $farms = Farm::orderBy('id', 'DESC')->pluck('name', 'id');
        $farms_all = Farm::all();
        // Clientes
        $clients = Client::orderBy('id', 'DESC')->pluck('name', 'id');
        
        // Comercial Invoice Items
        $comercial_invoice_items = ComercialInvoiceItem::where('id_load', '=', $load)->get();
        //dd($comercial_invoice_items);

        return view('invoiceh.index', compact('code', 'load', 'bl', 'invoice_n', 'carrier', 'date_load', 'id_invoice', 'farms', 'clients', 'comercial_invoice_items', 'farms_all'));
    }


    public function exportPdf()
    {
        // Codigo
        $url= $_SERVER["REQUEST_URI"];
        $div = explode("?", $url);
        $code = $div[1];
        // Load
        $load_code = Load::where('id', '=', $code)->get();
        $load = $load_code[0]->id;
        
        // Comercial Invoice Items
        $comercial_invoice_items = ComercialInvoiceItem::where('id_load', '=', $load)->get();
        // Fincas
        $farms_all = Farm::all();
        //dd($comercial_invoice_items);
        
        $pdf = PDF::loadView('invoiceh.pdf', compact('comercial_invoice_items', 'farms_all'));
        
        return $pdf->download('comercial-invoice.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice_comercial = InvoiceHeader::create($request->all());
        $load = Load::where('id', '=', $invoice_comercial->id_load)->get();

        return redirect()->route('invoiceh.index', $load[0]->code)
            ->with('info', 'Factura guardada con exito');
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
        $invoiceh = InvoiceHeader::find($id);
        return view('invoiceh.edit', compact('invoiceh'));
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
        $invoiceh = InvoiceHeader::find($id);
        $invoiceh->update($request->all());

        $load = Load::where('id', '=', $invoiceh->id_load)->get();

        return redirect()->route('invoiceh.index', $load[0]->code)
            ->with('edit', 'Factura actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoiceh = InvoiceHeader::find($id);
        $invoiceh->delete();

        $load = Load::where('id', '=', $invoiceh->id_load)->get();

        return redirect()->route('invoiceh.index', $load[0]->code)
            ->with('danger', 'Factura Eliminada correctamente');
    }
}
