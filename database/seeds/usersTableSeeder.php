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
            [
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
            ],
            [
                'nombre' => 'Marcelo',
                'email' => 'marcelo@gmail.com',
                'password' => bcrypt('123456'),
                'ape_paterno' => 'Peña',
                'ape_materno' => '',
                'rut' => '', 
                'fec_nacimiento' => '0000/01/01', 
                'fec_ingreso' => '0000/01/01',
                'sexo' => '',
                'rol_id' => 1,
                'departamento_id' => '1',
            ],
            [
                'nombre' => 'Michael',
                'email' => 'michael@gmail.com',
                'password' => bcrypt('123456'),
                'ape_paterno' => 'Mondaca',
                'ape_materno' => '',
                'rut' => '', 
                'fec_nacimiento' => '0000/01/01', 
                'fec_ingreso' => '0000/01/01',
                'sexo' => '',
                'rol_id' => 1,
                'departamento_id' => '1',
            ],
            [
                'nombre' => 'carolina Lisett',
                'email' => 'moralesC@contacto21.cl',
                'password' => bcrypt('123456'),
                'ape_paterno' => 'morales',
                'ape_materno' => 'sanhueza',
                'rut' => '17852551', 
                'fec_nacimiento' => '0000/01/01', 
                'fec_ingreso' => '2010/12/21',
                'sexo' => 'F',
                'rol_id' => 2,
                'departamento_id' => '1',
            ],
            [
                'nombre' => 'satcha Belen',
                'email' => 'paradaS@contacto21.cl',
                'password' => bcrypt('123456'),
                'ape_paterno' => 'parada',
                'ape_materno' => 'quispe',
                'rut' => '19829591', 
                'fec_nacimiento' => '0000/01/01', 
                'fec_ingreso' => '2013/07/11',
                'sexo' => 'F',
                'rol_id' => 2,
                'departamento_id' => '1',
            ],
            [
                'nombre' => 'mauricio Esteban',
                'email' => 'veram@contacto21.cl',
                'password' => bcrypt('123456'),
                'ape_paterno' => 'vera',
                'ape_materno' => 'padilla',
                'rut' => '18764426', 
                'fec_nacimiento' => '0000/01/01', 
                'fec_ingreso' => '2013/06/17',
                'sexo' => 'M',
                'rol_id' => 3,
                'departamento_id' => '2',
            ],
            [
                'nombre' => 'camila Andrea',
                'email' => 'pardoc@contacto21.cl',
                'password' => bcrypt('123456'),
                'ape_paterno' => 'pardo',
                'ape_materno' => 'monje',
                'rut' => '17879662  ', 
                'fec_nacimiento' => '0000/01/01', 
                'fec_ingreso' => '2013/06/17',
                'sexo' => 'M',
                'rol_id' => 3,
                'departamento_id' => '2',
            ],
            [
                'nombre' => 'maria Raquel',
                'email' => 'canalesm@contacto21.cl',
                'password' => bcrypt('123456'),
                'ape_paterno' => 'canales',
                'ape_materno' => 'gutierrez',
                'rut' => '14474639  ', 
                'fec_nacimiento' => '0000/01/01', 
                'fec_ingreso' => '2012/05/09',
                'sexo' => 'F',
                'rol_id' => 4,
                'departamento_id' => '4',
            ],
            
        ]);
    }
}
