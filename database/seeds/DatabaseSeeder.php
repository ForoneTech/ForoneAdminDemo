<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        Model::reguard();

		$this->call('AdminsTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('PasswordResetsTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('PermissionsTableSeeder');
		$this->call('RoleUserTableSeeder');
		$this->call('PermissionUserTableSeeder');
		$this->call('PermissionRoleTableSeeder');
		$this->call('TagsTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('ArtistsTableSeeder');
		$this->call('ArticalsTableSeeder');
		$this->call('MigrationsTableSeeder');
	}
}
