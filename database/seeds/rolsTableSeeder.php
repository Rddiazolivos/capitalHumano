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
        DB::table('rols')->insert([
            'nombre' => 'Administrador',
        ]);
        DB::table('rols')->insert([
            'nombre' => 'Evaluador',
        ]);
        DB::table('rols')->insert([
            'nombre' => 'Evaluado',
        ]);
        DB::table('departamentos')->insert([
            'nombre' => 'Ventas',
            'descripcion' => 'Ventas'
        ]);
    }
}
