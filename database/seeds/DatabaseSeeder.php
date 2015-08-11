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
		$this->call('ArtistsTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('MigrationsTableSeeder');
		$this->call('PasswordResetsTableSeeder');
		$this->call('PermissionRoleTableSeeder');
		$this->call('PermissionUserTableSeeder');
		$this->call('PermissionsTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('RoleUserTableSeeder');
        $this->call('TagsTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('ArticalsTableSeeder');
	}
}
