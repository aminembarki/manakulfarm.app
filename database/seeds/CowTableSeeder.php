<?php

use Illuminate\Database\Seeder;

use App\Cow;

class CowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('cow')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        factory(Cow::class, 50)->create();
    }
}
