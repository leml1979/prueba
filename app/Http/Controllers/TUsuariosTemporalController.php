<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TUsuariosTemporal;
use App\Models\ESeniat;
use Carbon\Carbon;
use App\Http\Requests\RegistroRequest;
use Mail;
use App\Models\User;
use Hash;



class TUsuariosTemporalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guardarUsuario(Request $request)
    {
        $this->validate($request, [
           'password'  => 'required|min:4|max:10',
           'password_confirmar' => 'required|same:password',
           'email'=> 'unique:users,email',
           'rif' => 'unique:users,rif'
       ]);
        $usuario = new User();
        $usuario->rif=$request->rif;
        $usuario->email=$request->email;
        $usuario->password= Hash::make($request->password);
        $usuario->estatus= 1;
        $usuario->name=$request->razon_social;
        $usuario->seniat_id=$request->seniat_id;
        if($usuario->save()){
            flash("Ingrese al sistema con el usuario: ".$usuario->email. " y la contraseña creada")->success();
            return redirect()->route('login');
        }else{
            flash("Intente nuevamente")->error()->important();
            return redirect()->route('login');
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verificar($hash)
    {
      $tUsuariosTemporal = TUsuariosTemporal::where('hash',$hash)->get();
      if($tUsuariosTemporal->count()){
        $seniat = ESeniat::where("rif",$tUsuariosTemporal[0]['rif'])->get(["razon_social","id"]);
        return view("registro.password",compact('tUsuariosTemporal','seniat'));
      }
      else{
        return "no valido el hash";
      }
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
            $hash=sha1($request->rif.$date->format('d-m-y h:m:s'));
            if(TUsuariosTemporal::create([
                'rif' => $request->rif,
                'email' => $request->email,
                'hash' => $hash,
                'estatus'=>0,
                'seniat_id'=>$seniat[0]->id,
            ])){
                $subject = "Inscripción de Nuevo Usuario";
                $for = $request->email;
                Mail::send('mails.registro',['rif'=>$request->rif,'email'=>$request->email,'hash'=>$hash,'razon_social'=> mb_strtoupper($seniat[0]['razon_social'],'UTF-8')], function($msj) use($subject,$for){
                    $msj->from("noresponder@sundde.gob.ve","Superintendencia de Precios Justos");
                    $msj->subject($subject);
                    $msj->to($for);
                });
                return redirect()->route('registroMensaje');
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
