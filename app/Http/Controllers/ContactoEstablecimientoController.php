<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\RContactosEstablecimiento;
use App\Models\MSujeto;
use Arr;
use App\Models\TEstablecimiento;



class ContactoEstablecimientoController extends Controller
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
    public function index($id=0)
    {
        $contactos = RContactosEstablecimiento::where("establecimiento_id",$id)->get();

        return view("establecimiento.contactos.listar", compact("contactos","id"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=0)
    {
       return view("establecimiento.contactos.agregar", compact("id"));
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
        $rules = [
            "tipo"=>"required|in:V,E",
            "documento_identidad"=>"required|min:8|max:10",
            "telefono"=>"required|regex:/[0-9]{11}/|starts_with:02",
            "correo"=>"required|email:rfc,dns",
        ];
        if($request->celular!=null){
            $rules=Arr::add($rules, "celular","regex:/[0-9]{11}/|starts_with:04");
        }
        if($request->seniatsaime!=null){
       // dd($rules);
            $request->validate($rules);

            $sujeto= MSujeto::where("rif",Auth::user()->rif)->first();
            $contacto = new RContactosEstablecimiento;
            $contacto->cargo = $request->cargo;
            $contacto->correo = $request->correo;
            $contacto->telefono = $request->telefono;
            $contacto->celular = $request->celular;
            $contacto->establecimiento_id = $request->establecimiento_id;
            $contacto->saime_id = $request->seniatsaime;
            $contacto->id_usuario_creador=Auth::user()->id;
            $contacto->id_usuario_modificador=Auth::user()->id;
            if($contacto->save()){
                $establecimiento = $contacto->establecimiento;
                $establecimiento->estatus_contacto=1;
                $establecimiento->update();
                $mensaje="El(la) contacto se a registrado";
                flash($mensaje)->success()->important();
                return redirect()->route('establecimiento.contacto',$request->establecimiento_id);
            }else{
                $mensaje="El(la) contacto no se a registrado";
                flash($mensaje)->error()->important();
                return redirect()->route('establecimiento.contacto',$request->establecimiento_id);
            }
        }else{
            $mensaje="Debe Consultar una cedula";
            flash($mensaje)->error()->important();
            return redirect()->route('establecimiento.contacto',$request->establecimiento_id);
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
    public function destroy($id,$establecimiento_id=0)
    {
        $contacto = RContactosEstablecimiento::find($id);
        $contacto->delete();
        $contactos = RContactosEstablecimiento::where("establecimiento_id",$establecimiento_id)->count();
        if(!$contactos){
            $establecimiento = TEstablecimiento::find($establecimiento_id);
            $establecimiento->estatus_contacto=0;
            $establecimiento->update();
        }
        $mensaje="El(la) contacto se a eliminado";
        flash($mensaje)->error()->important();
        return redirect()->route('establecimiento.contacto',$establecimiento_id);
    }
}
