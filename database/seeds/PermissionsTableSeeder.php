<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('permissions')->delete();
        
		\DB::table('permissions')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'permissions#',
				'readable_name' => '权限',
				'created_at' => '2015-08-11 07:10:05',
				'updated_at' => '2015-08-11 07:10:05',
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'admin.roles.index',
				'readable_name' => '角色管理',
				'created_at' => '2015-08-11 07:10:05',
				'updated_at' => '2015-08-11 07:10:05',
			),
			2 => 
			array (
				'id' => 3,
				'name' => 'admin.permissions.index',
				'readable_name' => '权限管理',
				'created_at' => '2015-08-11 07:10:05',
				'updated_at' => '2015-08-11 07:10:05',
			),
			3 => 
			array (
				'id' => 4,
				'name' => 'admin.admins.index',
				'readable_name' => '管理员管理',
				'created_at' => '2015-08-11 07:10:05',
				'updated_at' => '2015-08-11 07:10:05',
			),
		));
	}

}
