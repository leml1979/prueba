<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	//seniat
     Permission::create(['name'=>'seniat.index']);

     Permission::create(['name'=>'accionista.index']);
     Permission::create(['name'=>'accionista.create']);
     Permission::create(['name'=>'accionista.edit']);
     Permission::create(['name'=>'accionista.eliminar']);
     Permission::create(['name'=>'accionista.buscar']);

     Permission::create(['name'=>'adicional.index']);
     Permission::create(['name'=>'adicional.create']);
     Permission::create(['name'=>'adicional.edit']);
     Permission::create(['name'=>'adicional.registroMercantil']);
     Permission::create(['name'=>'adicional.registroMercantilCreate']);
     Permission::create(['name'=>'adicional.registroMercantilEdit']);
     Permission::create(['name'=>'adicional.clasificacion']);
     Permission::create(['name'=>'adicional.clasificacionCreate']);
     Permission::create(['name'=>'adicional.clasificacionEdit']);
     Permission::create(['name'=>'adicional.direccion']);
     Permission::create(['name'=>'adicional.direccionCreate']);
     Permission::create(['name'=>'adicional.direccionEdit']);


     Permission::create(['name'=>'representante.index']);
     Permission::create(['name'=>'representante.create']);
     Permission::create(['name'=>'representante.edit']);
     Permission::create(['name'=>'representante.eliminar']);
     Permission::create(['name'=>'representante.buscar']);

     Permission::create(['name'=>'establecimiento.index']);
     Permission::create(['name'=>'establecimiento.create']);
     Permission::create(['name'=>'establecimiento.edit']);
     Permission::create(['name'=>'establecimiento.eliminar']);

     Permission::create(['name'=>'contacto.index']);
     Permission::create(['name'=>'contacto.create']);
     Permission::create(['name'=>'contacto.edit']);
     Permission::create(['name'=>'contacto.eliminar']);

     Permission::create(['name'=>'proveedores.index']);
     Permission::create(['name'=>'proveedores.create']);
     Permission::create(['name'=>'proveedores.edit']);
     Permission::create(['name'=>'proveedores.destroy']);

     Permission::create(['name'=>'certificado.index']);
     Permission::create(['name'=>'certificado.pdf']);
     Permission::create(['name'=>'certificado.pdfEstablecimiento']);
     Permission::create(['name'=>'certificado.certificarEstablecimiento']);
     Permission::create(['name'=>'certificado.certificarSujeto']);

     Permission::create(['name'=>'cartera_cliente.index']);
     Permission::create(['name'=>'cartera_cliente.create']);
     Permission::create(['name'=>'cartera_cliente.edit']);
     Permission::create(['name'=>'cartera_cliente.eliminar']);
     Permission::create(['name'=>'cartera_cliente.buscar']);

     Permission::create(['name'=>'registro_mercantil.index']);
     Permission::create(['name'=>'registro_mercantil.create']);
     Permission::create(['name'=>'registro_mercantil.edit']);




//Admin
     $admin = Role::create(['name' => 'Admin']);

     $admin->givePermissionTo([
      'seniat.index',

      'accionista.index',
      'accionista.edit',
      'accionista.create',
      'accionista.eliminar',
      'accionista.buscar',

      'adicional.index',
      'adicional.edit',
      'adicional.create',

      'representante.index',
      'representante.edit',
      'representante.create',
      'representante.eliminar',

      'establecimiento.index',
      'establecimiento.edit',
      'establecimiento.create',
      'establecimiento.eliminar',

      'contacto.index',
      'contacto.edit',
      'contacto.create',
      'contacto.eliminar',

      'proveedores.index',
      'proveedores.edit',
      'proveedores.create',
      'proveedores.destroy',

      'certificado.index',
      'certificado.pdf',
      'certificado.pdfEstablecimiento',
      'certificado.certificarEstablecimiento',
      'certificado.certificarSujeto',

      'cartera_cliente.index',
      'cartera_cliente.edit',
      'cartera_cliente.create',
      'cartera_cliente.eliminar',
      'cartera_cliente.buscar',

      'registro_mercantil.index',
      'registro_mercantil.create',
      'registro_mercantil.edit',
    ]);

//juridico
     $guest = Role::create(['name' => 'juridico']);
     $natural = Role::create(['name' => 'natural']);

     $guest->givePermissionTo([
       //'seniat.index',

       'accionista.index',
       'accionista.edit',
       'accionista.create',
       'accionista.eliminar',
       'accionista.buscar',

     //  'adicional.index',
      // 'adicional.edit',
       //'adicional.create',
       'adicional.registroMercantil',
       'adicional.registroMercantilCreate',
       'adicional.registroMercantilEdit',
       'adicional.clasificacion',
       'adicional.direccion',
       'adicional.clasificacionCreate',
       'adicional.clasificacionEdit',
       'adicional.direccionCreate',
       'adicional.direccionEdit',

       'representante.index',
       'representante.edit',
       'representante.create',
       'representante.eliminar',
       
       'establecimiento.index',
       'establecimiento.edit',
       'establecimiento.create',
       'establecimiento.eliminar',

       /* 'contacto.index',
       'contacto.edit',
       'contacto.create',
       'contacto.eliminar',

      'proveedores.index',
       'proveedores.edit',
       'proveedores.create',
       'proveedores.destroy',*/

       'certificado.index',
       'certificado.pdf',
       'certificado.pdfEstablecimiento',
       'certificado.certificarEstablecimiento',
       'certificado.certificarSujeto',

       /*'cartera_cliente.index',
       'cartera_cliente.edit',
       'cartera_cliente.create',
       'cartera_cliente.eliminar',
       'cartera_cliente.buscar',*/

     ]);


     $natural->givePermissionTo([
       //'seniat.index',
       
       //'adicional.index',
       //'adicional.edit',
       //'adicional.create',
       'adicional.registroMercantil',
       'adicional.registroMercantilCreate',
       'adicional.registroMercantilEdit',
       'adicional.clasificacion',
       'adicional.direccion',
       'adicional.clasificacionCreate',
       'adicional.clasificacionEdit',
       'adicional.direccionCreate',
       'adicional.direccionEdit',

       
       'establecimiento.index',
       'establecimiento.edit',
       'establecimiento.create',
       'establecimiento.eliminar',

      /* 'contacto.index',
       'contacto.edit',
       'contacto.create',
       'contacto.eliminar',
       
       'proveedores.index',
       'proveedores.edit',
       'proveedores.create',
       'proveedores.destroy',*/

       'certificado.index',
       'certificado.pdf',
       'certificado.pdfEstablecimiento',
       'certificado.certificarEstablecimiento',
       'certificado.certificarSujeto',

     ]);
     $user = User::find(1);
     $user->assignRole('natural');
     $user = User::find(2);
     $user->assignRole('juridico');
   }
 }
