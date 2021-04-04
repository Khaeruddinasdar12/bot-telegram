<?php

use Illuminate\Database\Seeder;

class TelegramUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('telegram_users')->insert([
            'id'    => 416439159,
	        'nama_kontak'  => 'Khaeruddin Asdar',
		]);
		
		DB::table('telegram_users')->insert([
            'id'    => 589876870,
	        'nama_kontak'  => 'Adhee Pratama',
		]);
		
		DB::table('telegram_users')->insert([
            'id'    => 1169678853,
	        'nama_kontak'  => 'Iluh Mitha',
		]);
		
		DB::table('telegram_users')->insert([
            'id'    => 1257678746,
	        'nama_kontak'  => 'Vendi Pakiding Bawan',
		]);
		
		DB::table('telegram_users')->insert([
            'id'    => 889052078,
	        'nama_kontak'  => 'Icha',
		]);
    }
}
