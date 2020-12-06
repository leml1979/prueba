<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Julio Rodriguez',
            'email'     => 'leml1979@gmail.com',
            'password'     => bcrypt('roimir27'),
            'rif' => 'V189351701',
            'seniat_id' => 51,
            'declaracion_jurada'=>true,
            'respuesta_declaracion_jurada'=> "ESTOY DE ACUERDO",
        ]); 

        User::create([
            'name'      => 'jORGE pRUEBA',
            'email'     => 'luisedgardomartinezlinares@gmail.com',
            'password'     => bcrypt('roimir27'),
            'rif' => 'J220000001',
            'seniat_id' => 24395515,
            'declaracion_jurada'=>true,
            'respuesta_declaracion_jurada'=> "ESTOY DE ACUERDO",
        ]);
	//factory(App\Models\User::class, 7)->create();

    }
}
