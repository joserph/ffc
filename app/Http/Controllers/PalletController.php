<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pallet;
use App\Load;
use App\Http\Requests\AddPalletRequest;
use App\PalletItem;
use App\Farm;
use App\Client;

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
        $pallets = Pallet::paginate();
        
        $load_code = Load::where('code', '=', $code)->get();
        $load = $load_code[0]->id;
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
        $palletItem = PalletItem::all();
        // Farms
        $farms = Farm::all();
        // Clients
        $clients = Client::all();
        //dd($load);
        return view('pallets.index', compact('pallets','code', 'counter', 'number', 'load', 'palletItem', 'farms', 'clients', 'total_container', 'total_hb', 'total_qb', 'total_eb'));
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
