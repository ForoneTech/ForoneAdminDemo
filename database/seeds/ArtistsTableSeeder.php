<?php

use Illuminate\Database\Seeder;

class ArtistsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('artists')->delete();
        
	}

}
