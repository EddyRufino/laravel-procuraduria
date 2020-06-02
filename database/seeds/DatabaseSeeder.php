<?php

use App\Expediente;
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
        factory(User::class, 1)->create();
        // factory(Expediente::class, 5)->create();
        // $this->call(UserSeeder::class);
    }
}
