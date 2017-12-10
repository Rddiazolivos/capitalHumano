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
            [
                'nombre' => 'Administrador',
            ],
            [
                'nombre' => 'Evaluador',
            ],
            [
                'nombre' => 'Evaluado',
            ],
            [
                'nombre' => 'Gerente',
            ]
            
        ]);
        DB::table('departamentos')->insert([
            [
                'nombre' => 'Dirección',
                'descripcion' => 'Altos cargos',
            ],
            [
                'nombre' => 'Ventas',
                'descripcion' => 'Departamento a cargo de ventas',
            ],
            [
                'nombre' => 'Recursos Humanos',
                'descripcion' => 'Departamento a cargo de personal',
            ],
            [
                'nombre' => 'Administración',
                'descripcion' => 'Departamento a cargo de la administración',
            ],
            [
                'nombre' => 'Finanza y Contabilidad',
                'descripcion' => 'Departamento a cargo de dinero',
            ],
            [
                'nombre' => 'Publicidad',
                'descripcion' => 'Departamento a cargo de marketing',
            ],
            [
                'nombre' => 'Informática',
                'descripcion' => 'Core',
            ],
        ]);
        DB::table('estados')->insert([
            [
                'nombre' => 'Pendiente'
            ],
            [
                'nombre' => 'Finalizada'
            ],
            [
                'nombre' => 'Cerrada'
            ],            
        ]);
       
    }
}
