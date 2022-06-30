<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos='';
        $productos= Producto::all();
        return view("productos.index", compact("productos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::where('estatus',1)->pluck('nombre','id');
        return view("productos.form", compact("categorias"));
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
         'nombre'  => 'required|min:4',
         'descripcion' => 'required|min:5',
         'categoria' => 'required|exists:categorias,id',
         'exento' => 'required'
     ]);
        $producto = new Producto();
        $producto->nombre=$request->nombre;
        $producto->descripcion=$request->descripcion;
        $producto->exento = $request->exento;
        $producto->categoria_id = $request->categoria;
        $producto->save();

        $mensaje="Producto registrado!";
        flash($mensaje)->success();
        return redirect()->route("productos.index");


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
        $categorias = Categoria::where('estatus',1)->pluck('nombre','id');
        $producto = Producto::find($id);
        return view("productos.edit", compact("producto","categorias"));
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
         'nombre'  => 'required|min:4',
         'descripcion' => 'required|min:5',
         'categoria' => 'required|exists:categorias,id',
         'exento' => 'required'
     ],);
        $producto = Producto::find($id);
        $producto->nombre=$request->nombre;
        $producto->descripcion=$request->descripcion;
        $producto->exento = $request->exento;
        $producto->categoria_id = $request->categoria;
        $producto->save();

        $mensaje="Producto registrado!";
        flash($mensaje)->success();
        return redirect()->route("productos.index");
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
        $producto = Producto::find($id);
        if($producto->estatus==1)
        {
            $producto->estatus=0;
            $mensaje="producto Inactivado!";
        }
        else
        { 
            $producto->estatus=1;
            $mensaje="producto Activado!";
        }
        $producto->save();

        flash($mensaje)->success();
        return redirect()->route("productos.index");
    }
}
