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
                'nombre' => 'Direción',
                'descripcion' => 'Altos cargos',
            ],
            [
                'nombre' => 'Ventas',
                'descripcion' => 'Departamento a cargo de ventas',
            ],
            [
                'nombre' => 'Recursos humanos',
                'descripcion' => 'Departamento a cargo de personal',
            ],
            [
                'nombre' => 'Administración',
                'descripcion' => 'Departamento a cargo de la administración',
            ],
            [
                'nombre' => 'Finanza y contabilidad',
                'descripcion' => 'Departamento a cargo de dinero',
            ],
            [
                'nombre' => 'Publicidad',
                'descripcion' => 'Departamento a cargo de marketing',
            ],
            [
                'nombre' => 'Informatica',
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
