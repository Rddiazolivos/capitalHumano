<?php

use Illuminate\Database\Seeder;

class empresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'nombre' => 'Contacto 21',
            'telefono' => '95443267',
            'web' => 'www.contacto21.cl',
        ]);
        DB::table('sucursales')->insert([
            'nombre' => 'Defecto',
            'telefono' => '95443267'
        ]);
    }
}
