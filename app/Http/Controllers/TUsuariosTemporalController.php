<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TUsuariosTemporal;
use App\Models\ESeniat;
use Carbon\Carbon;
use App\Http\Requests\RegistroRequest;




class TUsuariosTemporalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(RegistroRequest $request)
    {
        //dd($request);
        $tUsuariosTemporal = TUsuariosTemporal::where("rif",$request->rif)->get();

        if($tUsuariosTemporal->count()){
            flash("Ya ha solicitado un registro, por favor verifique su correo");
            return redirect()->route('registro'); 
        }

        $seniat = ESeniat::where("rif",$request->rif)->get();
//dd($seniat[0]->rif);
        if($seniat->count()){
            $date = Carbon::now();
            //dd(sha1($request->rif));
            //existe en la tabla e_seniat el rif
            if(TUsuariosTemporal::create([
                'rif' => $request->rif,
                'email' => $request['email'],
                'hash' => sha1($request->rif.$date->format('d-m-y h:m:s')),
                'estatus'=>1,
                'seniat_id'=>$seniat[0]->id,
            ])){
                
                return redirect()->route('login');
            }
            

        }else{
            flash("El RIF no se encuentra registrado, Dirigirse al SENIAT");
            return redirect()->route('registro');
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
        //
    }
}
