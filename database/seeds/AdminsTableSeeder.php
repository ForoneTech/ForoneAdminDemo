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
				'password' => '$2y$10$LFMxJp5243DLToOmReOy5OyPEyLS7OK6abAIsbR8qLqdg/IS3MOCu',
				'remember_token' => NULL,
				'created_at' => '2015-08-11 07:10:05',
				'updated_at' => '2015-08-11 07:10:05',
			),
		));
	}

}
