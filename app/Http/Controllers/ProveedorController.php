<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\MPais;
use App\Models\MProveedor;
use App\Models\RProveedorSujeto;
use App\Models\MSujeto;
use App\Models\ESeniat;

class ProveedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:proveedores.index|proveedores.create|proveedores.edit|proveedores.destroy', ['only' => ['index','store']]);
        $this->middleware('permission:proveedores.create', ['only' => ['create','store']]);
        $this->middleware('permission:proveedores.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:proveedores.destroy', ['only' => ['destroy']]);
       // $this->middleware('permission:proveedores.buscar', ['only' => ['buscar']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sujeto = MSujeto::where("rif",Auth::user()->rif)->firstOrFail();
        $proveedorSujetos = RProveedorSujeto::where("sujeto_id",$sujeto->id)->get();
        return view("proveedores.listar", compact("proveedorSujetos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = MPais::orderBy("pais")->pluck("pais","id");
        unset($paises["229"]);
        return view("proveedores.agregar",compact("paises"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sujeto = MSujeto::where("rif",Auth::user()->rif)->first();
        if($request->tipo_proveedor=='1'){
            $request->validate([
             'rif'  => 'required|max:10|min:9',
             'tipo' => 'required|in:V,E,G,P,N,J,C'
         ],);
            $proveedor = new MProveedor;
            $proveedor->rif_codigo = $request->rif;
            $proveedor->proveedor =  mb_strtoupper($request->razon_social,"UTF-8");
            $proveedor->tipo_proveedor = 1;
            $proveedor->usuario_creador_id = Auth::user()->id;
            $proveedor->usuario_modificador_id = Auth::user()->id;
            if($proveedor->save()){
                $proveedor_sujeto = new RProveedorSujeto;
                
                $proveedor_sujeto->estatus=1;
                $proveedor_sujeto->proveedor_id=$proveedor->id;
                $proveedor_sujeto->sujeto_id=$sujeto->id;
                $proveedor_sujeto->id_usuario_creador = Auth::user()->id;
                $proveedor_sujeto->id_usuario_modificador = Auth::user()->id;

                if($proveedor_sujeto->save()){
                    $sujeto->estatus_proveedor = 1;
                    $sujeto->update();
                    $mensaje="El Proveedor nacional ".$request->razon_social." se a registrado";
                    flash($mensaje)->success()->important();
                    return redirect()->route('proveedores.index');
                }

            }

        }
        if($request->tipo_proveedor=='2'){
            $request->validate([
               'nombre_proveedor'  => 'required',
               'pais' => 'required|exists:m_paises,id'
           ]);

            //guardar el proveedor extranjero
            $proveedor = new MProveedor;
            $proveedor->rif_codigo = $request->codigo;
            $proveedor->proveedor =  mb_strtoupper($request->nombre_proveedor,"UTF-8");
            $proveedor->tipo_proveedor = 0;
            $proveedor->usuario_creador_id = Auth::user()->id;
            $proveedor->usuario_modificador_id = Auth::user()->id;
            if($proveedor->save()){
                //guardar el proveedr sujeto
                $proveedor_sujeto = new RProveedorSujeto;
                
                $proveedor_sujeto->estatus=1;
                $proveedor_sujeto->pais_id=$request->pais;
                $proveedor_sujeto->proveedor_id=$proveedor->id;
                $proveedor_sujeto->sujeto_id=$sujeto->id;
                $proveedor_sujeto->id_usuario_creador = Auth::user()->id;
                $proveedor_sujeto->id_usuario_modificador = Auth::user()->id;
                if($proveedor_sujeto->save()){
                    $sujeto->estatus_proveedor = 1;
                    $sujeto->update();
                    $mensaje="El Proveedor extranjero ".$request->nombre_proveedor." se a registrado";
                    flash($mensaje)->success()->important();
                    return redirect()->route('proveedores.index');
                }
            }
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
        $proveedorSujetos = RProveedorSujeto::find($id);
        $paises = MPais::orderBy("pais")->pluck("pais","id");
        unset($paises["229"]);
        if($proveedorSujetos->proveedor->tipo_proveedor==0){
            return view("proveedores.editar_extranjero",compact("proveedorSujetos","paises"));

        }elseif($proveedorSujetos->proveedor->tipo_proveedor==1){
            $mensaje="No puede editar proveedores nacionales, si desea elimine el seleccionado y registre otro";
            flash($mensaje)->error()->important(); 

            return redirect()->route('proveedores.index');
        }
       //return
        //dd($proveedorSujetos->proveedor->tipo_proveedor);
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
        if($request->tipo_proveedor=='2'){
            $request->validate([
               'nombre_proveedor'  => 'required',
               'pais' => 'required|exists:m_paises,id'
           ]);
            $proveedor_sujeto =  RProveedorSujeto::find($id);
            $proveedor = $proveedor_sujeto->proveedor;
            //guardar el proveedor extranjero
            $proveedor->rif_codigo = $request->codigo;
            $proveedor->proveedor =  mb_strtoupper($request->nombre_proveedor,"UTF-8");
            $proveedor->usuario_modificador_id = Auth::user()->id;
            if($proveedor->update()){
                //guardar el proveedr sujeto
                $proveedor_sujeto->pais_id=$request->pais;
                $proveedor_sujeto->id_usuario_modificador = Auth::user()->id;
                if($proveedor_sujeto->update()){
                    $mensaje="El Proveedor extranjero ".$request->nombre_proveedor." se a actualizado";
                    flash($mensaje)->success()->important();
                    return redirect()->route('proveedores.index');
                }
            }
        }
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
        $proveedorSujetos = RProveedorSujeto::find($id);
        $proveedor = $proveedorSujetos->proveedor;
        $mensaje="El Proveedor ".$proveedor->proveedor." se a eliminado";
        $proveedorSujetos->delete();
        $proveedor->delete();
        $sujetoProveedor = RProveedorSujeto::where("sujeto_id",$sujeto->id)->count();
        if(!$sujetoProveedor){
            $sujeto->estatus_proveedor=0;
            $sujeto->update();
        }
        flash($mensaje)->error()->important();
        return redirect()->route('proveedores.index');
    }

    public function buscarDatos(Request $request)
    {   
        $proveedor = ESeniat::where("rif",$request->tipo.$request->rif)->first();
        if($proveedor){
            return [
                'mensajes' => 1,
                'razon_social' =>$proveedor->razon_social,
            ];

        }
        else{
            return [
                'mensajes' => 0,
                'razon_social' =>"",
            ];
        }
    }
}
