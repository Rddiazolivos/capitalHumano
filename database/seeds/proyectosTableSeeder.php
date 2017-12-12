<?php

use Illuminate\Database\Seeder;

class proyectosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('proyectos')->insert([
            'nombre' => 'Contacto 21',
            'fec_creacion' => '95443267',
            'fec_termino' => 'www.contacto21.cl',
            'observaciones' => 'www.contacto21.cl',
            'encuAscendete_id' => 'www.contacto21.cl',
            'encuDescendente_id' => 'www.contacto21.cl',
            'encuDescendente_id' => 'www.contacto21.cl',
        ]);
    }
}
