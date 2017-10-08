<?php

use Illuminate\Database\Seeder;

class tipoTareasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos')->insert([
            'nombre' => 'Tarea'
        ]);
    }
}
