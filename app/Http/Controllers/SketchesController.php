<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SketchItem;
use App\Sketch;
use App\Load;
use App\Pallet;
use App\PalletItem;
use App\Farm;

class SketchesController extends Controller
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
        // Verificar espacios
        $load = Load::select('id')->where('code', '=', $code)->get();
        $id_load = $load[0]->id;
        $position24 = Sketch::where('id_load', '=', $id_load)->where('position', '=', '24')->get()->last();
        $sketchs = Sketch::where('id_load', '=', $id_load)->get();
        
        if($position24)
        {
            $space = 1;
        }else{
            $space = 0;
        }
        // Lista de paletas
        $pallets = Pallet::where('id_load', '=', $id_load)->pluck('counter', 'id');
        $all_pallets = Pallet::where('id_load', '=', $id_load)->get();
        // Items de las paletas
        $pallet_items = PalletItem::where('id_load', '=', $id_load)->get();
        // Fincas
        $farm = Farm::get();
        //dd($farm);
        return view('sketches.index', compact('code', 'space', 'sketchs', 'pallets', 'all_pallets', 'pallet_items', 'farm'));
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
        $id_load = Load::select('id')->where('code', '=', $request->code)->get();
        // Generar espacios
        for($i = 1; $i <= 24; $i++)
        {
            $sketch = new Sketch();
            $sketch->id_load = $id_load[0]->id;
            $sketch->position = $i;
            $sketch->save();
        }
        

        //dd($id_load[0]->id);

        return redirect()->route('sketches.index', $request->code)
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
        $sketch = Sketch::find($id);

        $sketch->update($request->all());
        //dd($request->id_pallet_items);

        return back()->with('edit', 'Posición Actualizada con exito');
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
