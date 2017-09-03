<?php

use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombre' => 'Administrador',
            'email' => 'ricardo_diaz1068@live.cl',
            'password' => bcrypt('123456'),
            'ape_paterno' => '',
            'ape_materno' => '',
            'rut' => '', 
            'fec_nacimiento' => '0000/01/01', 
            'fec_ingreso' => '0000/01/01',
            'sexo' => '',
            'rol_id' => 1,
            'departamento_id' => '1',
        ]);
        DB::table('users')->insert([
            'nombre' => '1',
            'email' => '1@live.cl',
            'password' => bcrypt('123456'),
            'ape_paterno' => '',
            'ape_materno' => '',
            'rut' => '', 
            'fec_nacimiento' => '0000/01/01', 
            'fec_ingreso' => '0000/01/01',
            'sexo' => '',
            'rol_id' => 2,
            'departamento_id' => '1',
        ]);
        DB::table('users')->insert([
            'nombre' => '2',
            'email' => '2@live.cl',
            'password' => bcrypt('123456'),
            'ape_paterno' => '',
            'ape_materno' => '',
            'rut' => '', 
            'fec_nacimiento' => '0000/01/01', 
            'fec_ingreso' => '0000/01/01',
            'sexo' => '',
            'rol_id' => 3,
            'departamento_id' => '1',
        ]);
    }
}
