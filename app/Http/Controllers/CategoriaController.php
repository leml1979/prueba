<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias='';
        $categorias= Categoria::all();
        return view("categorias.index", compact("categorias"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("categorias.form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'nombre'  => 'required|min:5',
       ],);
        $categoria = new Categoria();
        $categoria->nombre=$request->nombre;
        $categoria->save();

        $mensaje="Categoria registrada!";
        flash($mensaje)->success();
        return redirect()->route("categorias.index");
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
        $categoria = Categoria::find($id);
        return view("categorias.edit", compact("categoria"));
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
           'nombre'  => 'required|min:5',
       ],);
        $categoria = Categoria::find($id);
        $categoria->nombre=$request->nombre;
        $categoria->save();

        $mensaje="Categoria Modificada!";
        flash($mensaje)->success();
        return redirect()->route("categorias.index");

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
        $categoria = Categoria::find($id);
        if($categoria->estatus==1)
        {
            $categoria->estatus=0;
            $mensaje="Categoria Inactivada!";
        }
        else
        { 
            $categoria->estatus=1;
            $mensaje="Categoria Activada!";
        }
        $categoria->save();

        flash($mensaje)->success();
        return redirect()->route("categorias.index");
    }
}
