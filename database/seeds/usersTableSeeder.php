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
                'nombre' => 'CAROLINA LISETT',
                'email' => 'moralesC@contacto21.cl',
                'password' => bcrypt('123456'),
                'ape_paterno' => 'MORALES',
                'ape_materno' => 'SANHUEZA',
                'rut' => '17852551', 
                'fec_nacimiento' => '0000/01/01', 
                'fec_ingreso' => '2010/12/21',
                'sexo' => 'F',
                'rol_id' => 2,
                'departamento_id' => '1',
            ],
            [
                'nombre' => 'SATCHA BELEN',
                'email' => 'paradaS@contacto21.cl',
                'password' => bcrypt('123456'),
                'ape_paterno' => 'PARADA',
                'ape_materno' => 'QUISPE',
                'rut' => '19829591', 
                'fec_nacimiento' => '0000/01/01', 
                'fec_ingreso' => '2013/07/11',
                'sexo' => 'F',
                'rol_id' => 2,
                'departamento_id' => '1',
            ],
            [
                'nombre' => 'MAURICIO ESTEBAN',
                'email' => 'veram@contacto21.cl',
                'password' => bcrypt('123456'),
                'ape_paterno' => 'VERA',
                'ape_materno' => 'PADILLA',
                'rut' => '18764426', 
                'fec_nacimiento' => '0000/01/01', 
                'fec_ingreso' => '2013/06/17',
                'sexo' => 'M',
                'rol_id' => 3,
                'departamento_id' => '2',
            ],
            [
                'nombre' => 'CAMILA ANDREA',
                'email' => 'pardoc@contacto21.cl',
                'password' => bcrypt('123456'),
                'ape_paterno' => 'PARDO',
                'ape_materno' => 'MONJE',
                'rut' => '17879662  ', 
                'fec_nacimiento' => '0000/01/01', 
                'fec_ingreso' => '2013/06/17',
                'sexo' => 'M',
                'rol_id' => 3,
                'departamento_id' => '2',
            ],
            [
                'nombre' => 'MARIA RAQUEL',
                'email' => 'canalesm@contacto21.cl',
                'password' => bcrypt('123456'),
                'ape_paterno' => 'CANALES',
                'ape_materno' => 'GUTIERREZ',
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
