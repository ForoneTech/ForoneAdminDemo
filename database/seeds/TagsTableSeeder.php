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
				'name' => 'asfdas ',
				'admin_id' => NULL,
				'created_at' => '2015-08-11 08:17:43',
				'updated_at' => '2015-08-11 08:17:43',
			),
		));
	}

}
