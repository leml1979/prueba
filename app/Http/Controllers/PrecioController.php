<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Precio;
use App\Models\Producto;


class PrecioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $precios='';
        $precios= Precio::all();
        return view("precios.index", compact("precios"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::where('estatus',1)->pluck('nombre','id');
        return view("precios.form", compact("productos"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
         'fecha'  => 'required|date',
         'monto' => 'required|numeric',
         'producto' => 'required|exists:productos,id',
     ]);
        $precio = new Precio();
        $precio->fecha=$request->fecha;
        $precio->monto=$request->monto;
        $precio->producto_id = $request->producto;
        $precio->save();

        $mensaje="Precios a Producto registrado!";
        flash($mensaje)->success();
        return redirect()->route("precios.index");
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
        $productos = Producto::where('estatus',1)->pluck('nombre','id');
        $precio = Precio::find($id);
        return view("precios.edit", compact("precio","productos"));
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
        //dd($request->all());
        $request->validate([
         'fecha'  => 'required|date',
         'monto' => 'required|numeric',
         'producto' => 'required|exists:productos,id',
     ]);
        $precio = Precio::find($id);
        $precio->fecha=$request->fecha;
        $precio->monto=$request->monto;
        $precio->producto_id = $request->producto;
        $precio->save();

        $mensaje="Precios a Producto Modificado!";
        flash($mensaje)->success();
        return redirect()->route("precios.index");
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
    public function inactivar($id)
    {
        $precio = Precio::find($id);
        if($precio->estatus==1)
        {
            $precio->estatus=0;
            $mensaje="precio Inactivado!";
        }
        else
        { 
            $precio->estatus=1;
            $mensaje="precio Activado!";
        }
        $precio->save();

        flash($mensaje)->success();
        return redirect()->route("precios.index");
    }
}
