<?php

use App\Expediente;
use App\Juzgado;
use App\Materia;
use App\Proceso;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Materia::truncate();
        Juzgado::truncate();
        Proceso::truncate();
        Expediente::truncate();

        factory(User::class, 1)->create();
        factory(Materia::class, 5)->create();
        factory(Juzgado::class, 5)->create();
        factory(Proceso::class, 5)->create();
        factory(Expediente::class, 10)->create();
        // $this->call(UserSeeder::class);
    }
}