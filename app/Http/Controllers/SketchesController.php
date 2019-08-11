<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SketchItem;
use App\Sketch;
use App\Load;

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
        //dd($code);
        return view('sketches.index', compact('code'));
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
        /*$sketchItem = new SketchItem($request->all());
        $sketchItem->id_pallet = 11;
        $sketchItem->number = 22;
        $sketchItem->number_pallet = 22;
        $sketchItem->code = 22;
        $sketchItem->position = 'a';
        $sketchItem->save();*/
        $id_load = Load::select('id')->where('code', '=', $request->code)->get();
        
        $sketch = new Sketch();
        $sketch->id_load = $id_load[0]->id;
        $sketch->position = 2;
        $sketch->save();

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
