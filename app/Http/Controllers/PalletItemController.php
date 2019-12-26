<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Farm;
use App\Client;
use App\Pallet;
use App\PalletItem;
use App\Http\Requests\AddPalletItemRequest;
use App\Load;
use App\PalletItemsPdf;

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
        $farms = Farm::orderBy('name', 'ASC')->pluck('name', 'id');
        $clients = Client::orderBy('name', 'ASC')->pluck('name', 'id');
        $pallets = Pallet::select('id')->where('number', '=', $id)->get();
        $id_pallet = $pallets[0]->id; 

        // Breadcrums
        $load = Pallet::select('id_load')->where('number', '=', $id)->get();
        $loads = Load::select('code', 'id')->where('id', '=', $load[0]->id_load)->get();
        $code_load = $loads[0]->code;
        $id_load = $loads[0]->id;
        
        //dd($code_load);
        return view('palletitems.create', compact('palletitem', 'farms', 'clients', 'id_pallet', 'code_load', 'id_load'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPalletItemRequest $request)
    {
        $palletitem = PalletItem::create($request->all());
        $farm = Farm::select('name')->where('id', '=', $palletitem->id_farm)->first();
        $palletitem->farms = $farm->name;
        $palletitem->save();

        // Crear tabla agrupada
        $palletitem_pdf = PalletItemsPdf::where('id_load', '=', $palletitem->id_load)->where('id_client', '=', $palletitem->id_client)->where('id_farm', '=', $palletitem->id_farm)->first();
        //dd($palletitem_pdf);
        if($palletitem_pdf)
        {
            $palletitem_pdf->hb += $palletitem->hb;
            $palletitem_pdf->qb += $palletitem->qb;
            $palletitem_pdf->eb += $palletitem->eb;
            $palletitem_pdf->quantity += $palletitem->quantity; 
            $palletitem_pdf->save();
        }else{
            $palletitem_pdf = PalletItemsPdf::create($request->all());
            $farm = Farm::select('name')->where('id', '=', $palletitem_pdf->id_farm)->first();
            $palletitem_pdf->farms = $farm->name;
            $palletitem_pdf->save();
        }
        
        $pallet = Pallet::where('id', '=', $palletitem->id_pallet)->get();
        $load = Load::where('id', '=', $pallet[0]->id_load)->get();

        // Total paleta
        $total_pallet = PalletItem::where('id_pallet', '=', $palletitem->id_pallet)->sum('quantity');
        //dd($total_pallet);
        $pallet_update = Pallet::find($palletitem->id_pallet);
        $pallet_update->quantity = $total_pallet;
        $pallet_update->save();


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
        $palletitemsCode = PalletItem::select('id_pallet')->where('id', '=', $id)->get();
        $pallets = Pallet::select('number')->where('id', '=', $palletitemsCode[0]->id_pallet)->get();
        $palletitem = $pallets[0]->number;

        // Breadcrums
        $load = Pallet::select('id_load')->where('number', '=', $palletitem)->get();
        $loads = Load::select('code')->where('id', '=', $load[0]->id_load)->get();
        $id_load = $loads[0]->code;

        $farms = Farm::orderBy('id', 'DESC')->pluck('name', 'id');
        $clients = Client::orderBy('id', 'DESC')->pluck('name', 'id');

        $pallet = Pallet::select('id')->where('id', '=', $palletitemsCode[0]->id_pallet)->get();
        $id_pallet = $pallet[0]->id;

        $palletitems = PalletItem::find($id);

        //dd($palletitems);
        return view('palletitems.edit', compact('palletitem', 'id_load', 'farms', 'clients', 'id_pallet', 'palletitems'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddPalletItemRequest $request, $id)
    {
        $palletitem = PalletItem::find($id);
        
        $palletitem->update($request->all());
        if($request->piso == null)
        {
            //dd($request->piso);
            $palletitem->piso = 0;
        }else{
            $palletitem->piso = 1;
        }
        $farm = Farm::select('name')->where('id', '=', $palletitem->id_farm)->first();
        $palletitem->farms = $farm->name;
        $palletitem->save();

        // Total paleta
        $total_pallet = PalletItem::where('id_pallet', '=', $palletitem->id_pallet)->sum('quantity');
        //dd($total_pallet);
        $pallet_update = Pallet::find($palletitem->id_pallet);
        $pallet_update->quantity = $total_pallet;
        
        
        //dd($pallet_update->farms);
        $pallet_update->save();

        $palletitemsCode = PalletItem::select('id_pallet')->where('id', '=', $id)->get();
        $pallets = Pallet::select('id_load')->where('id', '=', $palletitemsCode[0]->id_pallet)->get();  
        $load = Load::select('code')->where('id', '=', $pallets[0]->id_load)->get(); 
        

        return redirect()->route('pallets.index', $load[0]->code)
            ->with('edit', 'Item Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $palletitem = PalletItem::find($id);
        $palletitem_pdf = PalletItemsPdf::where('id_load', '=', $palletitem->id_load)->where('id_client', '=', $palletitem->id_client)->where('id_farm', '=', $palletitem->id_farm)->first();
        if($palletitem_pdf)
        {
            $palletitem_pdf->hb -= $palletitem->hb;
            $palletitem_pdf->qb -= $palletitem->qb;
            $palletitem_pdf->eb -= $palletitem->eb;
            $palletitem_pdf->quantity -= $palletitem->quantity;
            if($palletitem_pdf->quantity == 0)
            {
                $palletitem_pdf->delete();
            }else{
                $palletitem_pdf->save();
            }
        }

        $palletitem->delete();

        return back()->with('danger', 'Item Eliminado correctamente');
    }
}
