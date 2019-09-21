<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ComercialInvoiceItem;
use App\Load;
use App\Farm;
use App\Client;

class ComercialInvoiceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //$request->pieces = $request->hb + $request->qb + $request->eb;
        //dd($request->pieces);
        $c_i_item = ComercialInvoiceItem::create($request->all());
        $c_i_item->pieces = $c_i_item->hb + $c_i_item->qb + $c_i_item->eb;
        $c_i_item->fulls = ($c_i_item->hb * 0.50) + ($c_i_item->qb * 0.25) + ($c_i_item->eb * 0.125);
        $c_i_item->description = strtoupper($c_i_item->description);
        $c_i_item->total = $c_i_item->stems * $c_i_item->price;
        $c_i_item->save();
        $load = Load::where('id', '=', $c_i_item->id_load)->get();

        return redirect()->route('invoiceh.index', $load[0]->code)
            ->with('info', 'Item guardado con exito');
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
        $farms = Farm::orderBy('id', 'DESC')->pluck('name', 'id');
        $clients = Client::orderBy('id', 'DESC')->pluck('name', 'id');
        $c_i_item = ComercialInvoiceItem::find($id);

        return view('comercialiitems.edit', compact('c_i_item', 'farms', 'clients'));
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
        $c_i_item = ComercialInvoiceItem::find($id);
        $c_i_item->update($request->all());
        $c_i_item->pieces = $c_i_item->hb + $c_i_item->qb + $c_i_item->eb;
        $c_i_item->fulls = ($c_i_item->hb * 0.50) + ($c_i_item->qb * 0.25) + ($c_i_item->eb * 0.125);
        $c_i_item->description = strtoupper($c_i_item->description);
        $c_i_item->total = $c_i_item->stems * $c_i_item->price;
        $c_i_item->save();
        $load = Load::where('id', '=', $c_i_item->id_load)->get();

        return redirect()->route('invoiceh.index', $load[0]->code)
            ->with('info', 'Item Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c_i_item = ComercialInvoiceItem::find($id);
        $c_i_item->delete();

        $load = Load::where('id', '=', $c_i_item->id_load)->get();

        return redirect()->route('invoiceh.index', $load[0]->code)
            ->with('danger', 'Item Eliminado correctamente');
    }
}
