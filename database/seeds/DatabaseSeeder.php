<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(rolsTableSeeder::class);
        $this->call(usersTableSeeder::class);
        $this->call(prioridadesTableSeeder::class);
        $this->call(tipoTareasTableSeeder::class);
    }
}
