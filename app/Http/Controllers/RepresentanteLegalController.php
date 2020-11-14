<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\MSujeto;
use App\Models\RRepresentanteLegal;
use App\Models\ESaime;

class RepresentanteLegalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sujeto = MSujeto::where("rif",Auth::user()->rif)->firstOrFail();
        $representantes = RRepresentanteLegal::where("sujeto_id",$sujeto->id)->get();
        return view("representante_legal.listar",compact("representantes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("representante_legal.agregar");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "tipo"=>"required|in:V,E",
            "documento_identidad"=>"required|min:8|max:10",
            "telefono"=>"required|regex:/[0-9]{11}/|starts_with:02",
            "correo"=>"required|email:rfc,dns",
        ];
        if($request->celular!=null){
            $rules=Arr::add($rules, "celular","regex:/[0-9]{11}/|starts_with:04");
        }
        $request->validate([$rules]);

        if($request->seniatsaime!=null){

            $sujeto= MSujeto::where("rif",Auth::user()->rif)->first();
            $representante = new RRepresentanteLegal();
            $representante->cargo = $request->cargo;
            $representante->correo = $request->correo;
            $representante->telefono = $request->telefono;
            $representante->celular = $request->celular;
            $representante->estatus = 1;
            $representante->sujeto_id = $sujeto->id;
            $representante->id_usuario_creador=Auth::user()->id;
            $representante->id_usuario_modificador=Auth::user()->id;
            $representante->saime_id = $request->seniatsaime;
            if($representante->save()){
                $sujeto->estatus_accionista=1;
                $sujeto->update();
                $mensaje="El(la) representante legal se a registrado";
                flash($mensaje)->success()->important();
                return redirect()->route('representante.index');
            }else{
                $mensaje="El(la) representante no se a registrado";
                flash($mensaje)->error()->important();
                return redirect()->route('representante.index');
            }
        }else{
            $mensaje="Debe Consultar una cedula";
            flash($mensaje)->error()->important();
            return redirect()->route('representante.index');
        }
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
        $sujeto = MSujeto::where("rif",Auth::user()->rif)->first();
        $representante = RRepresentanteLegal::find($id);
        $mensaje="El(la) representante  se a eliminado";
        $representante->delete();
        $sujetoRepresentante = RRepresentanteLegal::where("sujeto_id",$sujeto->id)->count();
        if(!$sujetoRepresentante){
            $sujeto->estatus_accionista=0;
            $sujeto->update();
        }
        flash($mensaje)->error()->important();
        return redirect()->route('representante.index');
    }
}