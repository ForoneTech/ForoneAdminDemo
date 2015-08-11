<?php

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('migrations')->delete();
        
		\DB::table('migrations')->insert(array (
			0 => 
			array (
				'migration' => '2014_10_12_000000_create_forone_admins_table',
				'batch' => 1,
			),
			1 => 
			array (
				'migration' => '2014_10_12_000000_create_users_table',
				'batch' => 1,
			),
			2 => 
			array (
				'migration' => '2014_10_12_100000_create_password_resets_table',
				'batch' => 1,
			),
			3 => 
			array (
				'migration' => '2015_02_23_161101_create_defender_roles_table',
				'batch' => 1,
			),
			4 => 
			array (
				'migration' => '2015_02_23_161102_create_defender_permissions_table',
				'batch' => 1,
			),
			5 => 
			array (
				'migration' => '2015_02_23_161103_create_defender_role_user_table',
				'batch' => 1,
			),
			6 => 
			array (
				'migration' => '2015_02_23_161104_create_defender_permission_user_table',
				'batch' => 1,
			),
			7 => 
			array (
				'migration' => '2015_02_23_161105_create_defender_permission_role_table',
				'batch' => 1,
			),
			8 => 
			array (
				'migration' => '2015_08_06_075243_create_tags_table',
				'batch' => 1,
			),
			9 => 
			array (
				'migration' => '2015_08_07_084532_create_categories_table',
				'batch' => 1,
			),
			10 => 
			array (
				'migration' => '2015_08_10_083255_create_artists_table',
				'batch' => 1,
			),
			11 => 
			array (
				'migration' => '2015_08_10_083433_create_articals_table',
				'batch' => 1,
			),
		));
	}

}
