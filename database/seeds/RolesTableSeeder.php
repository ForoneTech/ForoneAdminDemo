<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('roles')->delete();
        
		\DB::table('roles')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'superuser',
				'created_at' => '2015-08-11 05:43:01',
				'updated_at' => '2015-08-11 05:43:01',
			),
		));
	}

}
