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
        $this->call(UsersTableSeeder::class);
        $this->call(BreederTableSeeder::class);
        $this->call(CowTableSeeder::class);
        $this->call(BreedingTableSeeder::class);
        $this->call(TreatmentTableSeeder::class);
    }
}
