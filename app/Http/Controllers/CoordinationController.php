<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coordination;
use App\Load;
use App\Farm;
use App\Client;
use App\Product;
use Illuminate\Support\Collection as Collection;

class CoordinationController extends Controller
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
        
        // Coordinationes
        $coordinations = Coordination::where('id_load', '=', $load)->orderBy('farms', 'ASC')->get();
        
        // Fincas
        $farms = Farm::orderBy('name', 'ASC')->pluck('name', 'id');
        $farms_all = Farm::all();
        // Clientes
        $clients = Client::orderBy('name', 'ASC')->pluck('name', 'id');
        
        if($coordinations)
        {
            $clients_all = array();
            
            $coordinations2 = Coordination::select('id_client')->groupBy('id_client')->get();
            foreach ($coordinations2 as $item)
            {
                $clients_all[] = Client::where('id', '=', $item->id_client)->orderBy('name', 'ASC')->first();
            }
            $clients_all = Collection::make($clients_all);
        }else{
            
            $clients_all = Collection::make($clients_all);
        }

        //dd($coordinations);
        
        // Productos
        $products = Product::orderBy('name', 'ASC')->pluck('name', 'id');
        $product_all = Product::all();
        
        
        return view('coordinations.index', compact(
            'coordinations',
            'load',
            'farms',
            'clients',
            'products',
            'farms_all',
            'clients_all',
            'code'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coordinations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coordi = Coordination::create($request->all());
        $coordi->pieces = $coordi->fb + $coordi->hb + $coordi->qb + $coordi->eb;
        $coordi->fulls = ($coordi->fb * 1) + ($coordi->hb * 0.50) + ($coordi->qb * 0.25) + ($coordi->eb * 0.125);
        
        //$description = Product::select('name')->where('id', '=', $coordi->description)->first();
        //dd($description->name);
        //$coordi->description = $description->name;
        $farm = Farm::select('name')->where('id', '=', $coordi->id_farm)->first();
        $coordi->farms = $farm->name;
        $coordi->save();
        $load = Load::where('id', '=', $coordi->id_load)->get();

        return redirect()->route('coordinations.index', $load[0]->code)
            ->with('info', 'Coordinación guardada con exito');
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
        $coordination = Coordination::find($id);
        $farms = Farm::orderBy('name', 'ASC')->pluck('name', 'id');
        $clients = Client::orderBy('name', 'ASC')->pluck('name', 'id');
        $products = Product::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('coordinations.edit', compact(
            'coordination',
            'farms',
            'clients',
            'products'
        ));
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
        $coordination = Coordination::find($id);
        $coordination->update($request->all());
        $coordination->pieces = $coordination->fb + $coordination->hb + $coordination->qb + $coordination->eb;
        $coordination->fulls = ($coordination->fb * 1) + ($coordination->hb * 0.50) + ($coordination->qb * 0.25) + ($coordination->eb * 0.125);
        $farm = Farm::select('name')->where('id', '=', $coordination->id_farm)->first();
        $coordination->farms = $farm->name;
        $coordination->save();
        $load = Load::where('id', '=', $coordination->id_load)->get();

        return redirect()->route('coordinations.index', $load[0]->code)
            ->with('info', 'Coordinación actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coordination = Coordination::find($id);
        $coordination->delete();

        $load = Load::where('id', '=', $coordination->id_load)->get();

        return redirect()->route('coordinations.index', $load[0]->code)
            ->with('danger', 'Coordinación eliminada correctamente');
    }
}
