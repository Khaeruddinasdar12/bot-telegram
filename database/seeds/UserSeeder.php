<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
	        'name'  => 'Khaeruddin Asdar',
	        'email' => 'khaeruddinasdar12@gmail.com',
	        'password'  => bcrypt('12345678')
		]);
		
		DB::table('users')->insert([
	        'name'  => 'Vendi Pakiding Bawan',
	        'email' => 'vendi@gmail.com',
	        'password'  => bcrypt('12345678')
		]);

    }
}
