<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\

class TipologiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Permission::create(['name'=>'seniat.index']);

    	Permission::create(['name'=>'accionista.index']);
    	Permission::create(['name'=>'accionista.create']);
    	Permission::create(['name'=>'accionista.edit']);
    	Permission::create(['name'=>'accionista.eliminar']);
    	Permission::create(['name'=>'accionista.buscar']);

    	Permission::create(['name'=>'adicional.index']);
    	Permission::create(['name'=>'adicional.create']);
    	Permission::create(['name'=>'adicional.edit']);
    }
}
