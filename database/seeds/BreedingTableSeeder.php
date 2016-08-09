<?php

use Illuminate\Database\Seeder;

use App\Breeding;

class BreedingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('breeding')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        factory(Breeding::class, 150)->create();
    }
}
