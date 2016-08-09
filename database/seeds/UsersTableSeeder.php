<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        App\User::create([
        	'name' => 'Teerapong Manakul',
        	'email' => 'teerapong@manakulfarm.com',
        	'password' => bcrypt(123456),
        ]);
    }
}
