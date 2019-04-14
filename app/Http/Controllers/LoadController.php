<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Load;
use App\Http\Requests;
use App\Http\Requests\AddLoadRequest;
use App\Http\Requests\UpdateLoadRequest;

class LoadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loads = Load::OrderBy('date', 'DESC')->paginate();

        return view('loads.index', compact('loads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddLoadRequest $request)
    {
        $load = Load::create($request->all());

        return redirect()->route('loads.index')
            ->with('info', 'Contenedor guardado con exito');
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
        $load = Load::find($id);

        return view('loads.edit', compact('load'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLoadRequest $request, $id)
    {
        $load = Load::find($id);
        $load->update($request->all());

        return redirect()->route('loads.index')->with('info', 'Contenedor actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $load = Load::find($id);
        $load->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
