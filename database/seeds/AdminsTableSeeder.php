<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('admins')->delete();
        
		\DB::table('admins')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => '超级管理员',
				'email' => 'admin@admin.com',
				'password' => '$2y$10$UJD3lSatBBt4HwzSKOEQReUWv04uITtfbPq2Yq0z8PoIXcxJzBoYe',
				'remember_token' => NULL,
				'created_at' => '2015-08-11 05:43:01',
				'updated_at' => '2015-08-11 05:43:01',
			),
		));
	}

}
