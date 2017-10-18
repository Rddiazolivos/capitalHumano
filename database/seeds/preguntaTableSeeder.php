<?php

use Illuminate\Database\Seeder;

class preguntaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('encuestas')->insert([
            'nombre' => 'Defecto'
        ]);
        DB::table('preguntas')->insert([
            'concepto' => '¿El trabajor cumplio con lo requerido?'
        ]);
    }
}
