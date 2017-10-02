<?php

use Illuminate\Database\Seeder;

class rolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nombre' => 'Administrador',
        ]);
        DB::table('roles')->insert([
            'nombre' => 'Evaluador',
        ]);
        DB::table('roles')->insert([
            'nombre' => 'Evaluado',
        ]);
        DB::table('departamentos')->insert([
            'nombre' => 'Ventas',
            'descripcion' => 'Ventas'
        ]);
        DB::table('estados')->insert([
            'nombre' => 'Pendiente'
        ]);
        DB::table('estados')->insert([
            'nombre' => 'Finalizada'
        ]);
        DB::table('estados')->insert([
            'nombre' => 'Cerrada'
        ]);
       
    }
}
