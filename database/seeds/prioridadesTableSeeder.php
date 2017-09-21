<?php

use Illuminate\Database\Seeder;

class prioridadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prioridades')->insert([
            'nombre' => 'Baja'
        ]);
        DB::table('prioridades')->insert([
            'nombre' => 'Media'
        ]);
        DB::table('prioridades')->insert([
            'nombre' => 'Alta'
        ]);
    }
}
