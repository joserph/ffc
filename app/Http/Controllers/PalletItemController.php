<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Farm;
use App\Client;
use App\Pallet;
use App\PalletItem;
use App\Http\Requests\AddPalletItemRequest;
use App\Load;

class PalletItemController extends Controller
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
    public function create($id)
    {
        $palletitem = $id;
        $farms = Farm::orderBy('id', 'DESC')->pluck('name', 'id');
        $clients = Client::orderBy('id', 'DESC')->pluck('name', 'id');
        $pallets = Pallet::select('id')->where('number', '=', $id)->get();
        $id_pallet = $pallets[0]->id;
        //dd($id_pallet);
        return view('palletitems.create', compact('palletitem', 'farms', 'clients', 'id_pallet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPalletItemRequest $request)
    {
        $palletItem = PalletItem::create($request->all());
        $pallet = Pallet::where('id', '=', $palletItem->id_pallet)->get();
        $load = Load::where('id', '=', $pallet[0]->id_load)->get();
        //dd($load);
        return redirect()->route('pallets.index', $load[0]->code)
            ->with('info', 'Item Guardado con exito');
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
        //
    }
}
