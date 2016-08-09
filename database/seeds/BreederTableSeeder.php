<?php

use Illuminate\Database\Seeder;

use App\Breeder;

class BreederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('breeder')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        factory(Breeder::class, 10)->create();
    }
}
