<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('tags')->delete();
        
		\DB::table('tags')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'ddd ',
				'admin_id' => NULL,
				'created_at' => '2015-08-11 05:43:29',
				'updated_at' => '2015-08-11 05:45:04',
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'dfsd ',
				'admin_id' => NULL,
				'created_at' => '2015-08-11 05:48:21',
				'updated_at' => '2015-08-11 05:48:21',
			),
		));
	}

}
