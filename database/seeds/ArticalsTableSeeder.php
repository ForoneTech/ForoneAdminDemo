<?php

use Illuminate\Database\Seeder;

class ArticalsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('articals')->delete();
        
	}

}
