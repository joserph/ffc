<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pallet;
use App\Load;
use App\Http\Requests\AddPalletRequest;
use App\PalletItem;
use App\Farm;
use App\Client;
use App\PalletItemsPdf;
use App\Coordination;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Collection as Collection;

class PalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url= $_SERVER["REQUEST_URI"];
        $div = explode("?", $url);
        $code = $div[1];
        
        $load_code = Load::where('code', '=', $code)->get();
        $load = $load_code[0]->id;
        $pallets = Pallet::where('id_load', '=', $load)->orderBy('id', '=', 'DESC')->get();
        
        $last_pallet = Pallet::where('id_load', '=', $load)->select('counter')->get()->last();
        
        // Total contenedor
        $total_container = PalletItem::where('id_load', '=', $load)->sum('quantity');
        // Total HB
        $total_hb = PalletItem::where('id_load', '=', $load)->sum('hb');
        // Total QB
        $total_qb = PalletItem::where('id_load', '=', $load)->sum('qb');
        // Total EB
        $total_eb = PalletItem::where('id_load', '=', $load)->sum('eb');
        
        if($last_pallet)
        {
            $counter = $last_pallet->counter + 1;
        }else{
            $counter = 1;
        }
        $number = $code . '-' . $counter;
        $palletItem = PalletItem::where('id_load', '=', $load)->get();
        // Farms
        $farms = Farm::all();
        // Clients
        $clients = Client::all();
        //dd($pallets);
        return view('pallets.index', compact('pallets','code', 'counter', 'number', 'load', 'palletItem', 'farms', 'clients', 'total_container', 'total_hb', 'total_qb', 'total_eb'));
    }

    public function exportPdf()
    {
        //$pallets = Pallet::get();
        // Codigo
        $url= $_SERVER["REQUEST_URI"];
        $div = explode("?", $url);
        $code = $div[1];
        // Load
        $load_code = Load::where('code', '=', $code)->get();
        $load = $load_code[0]->id;
        $load_current = $load_code[0];

        $pallet_items = PalletItemsPdf::where('id_load', '=', $load)->orderBy('id_farm', 'ASC')->get();

        $clients_all = array();
        $pallet_items2 = PalletItem::select('id_client')->groupBy('id_client')->get();
        foreach ($pallet_items2 as $item)
        {
            $clients_all[] = Client::where('id', '=', $item->id_client)->orderBy('name', 'ASC')->first();
        }
        $clients_all = Collection::make($clients_all)->sortBy('name');
        // Farms
        $farms = Farm::all();
        // Guia hija de finca por cliente
        $hawb = Coordination::select('hawb', 'id_load', 'id_client', 'id_farm')->where('id_load', '=', $load)->get();

        //dd($load_code[0]);
        $pdf = PDF::loadView('pallets.pdf', compact('pallets', 'clients_all', 'pallet_items', 'farms', 'hawb', 'load_current'));
        return $pdf->stream();
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
    public function store(AddPalletRequest $request)
    {
        $pallet = Pallet::create($request->all());
        if($pallet->usda == '1')
        {
            $id_load = Load::select('code')->where('id', '=', $pallet->id_load)->first();
            $pallet->number = $id_load->code .'-USDA';
        }else{
            $pallet->number = $pallet->number;
        }
        $pallet->save();
        $load = Load::where('id', '=', $pallet->id_load)->get();

        return redirect()->route('pallets.index', $load[0]->code)
            ->with('info', 'Paleta Guardada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // pdf o csv
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pallet = Pallet::find($id);
        $pallet->delete();

        return back()->with('danger', 'Paleta Eliminada correctamente');
    }
}
