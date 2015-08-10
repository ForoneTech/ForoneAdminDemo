<?php

namespace Artesaos\Defender\Testing;

use Artesaos\Defender\Contracts\Repositories\RoleRepository;
use Artesaos\Defender\Role;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class EloquentRoleRepositoryTest.
 */
class EloquentRoleRepositoryTest extends AbstractTestCase
{
    /**
     * @inheritdoc
     */
    public function setUp()
    {
        parent::setUp();

        $this->migrate([
            $this->stubsPath('database/migrations'),
            $this->resourcePath('migrations'),
        ]);

        $this->seed('UserTableSeeder');
    }

    /**
     * Asserting if the User and Role model has traits.
     */
    public function testUserShouldHasRolesTrait()
    {
        $this->assertUsingTrait(
            'Artesaos\Defender\Traits\HasDefender',
            'Artesaos\Defender\Testing\User'
        );

        $this->assertUsingTrait(
            'Artesaos\Defender\Traits\Users\HasRoles',
            'Artesaos\Defender\Testing\User'
        );

        $this->assertUsingTrait(
            'Artesaos\Defender\Traits\Permissions\RoleHasPermissions',
            'Artesaos\Defender\Role'
        );

        $this->assertUsingTrait(
            'Artesaos\Defender\Traits\Permissions\InteractsWithPermissions',
            'Artesaos\Defender\Role'
        );
    }

    /**
     * Testing the criation of roles.
     */
    public function testShouldCreateRole()
    {
        $this->createRole('superuser');
    }

    /**
     * Testing attach role to a user.
     */
    public function testShouldAttachRoleToUserAdmin()
    {

        /** @var Role $role */
        /** @var User $user */
        list($role, $user) = $this->createAndAttachRole('superuser', ['name' => 'admin']);

        $this->notSeeRoleAttachedToUserInDatabase($role, User::where('name', 'normal')->first());

        /** @var Collection $users */
        $users = $role->users;

        $this->assertTrue($users->contains($user->id));

        $this->createRole('anotherCoolRole');

        $this->assertTrue($user->hasRoles('superuser'));

        $this->assertFalse($user->hasRoles('anyOtherNonExistingRole'));

        $this->assertFalse($user->hasRoles('anotherCoolRole'));
    }

    /**
     * Create a role and assert to see in database.
     * @param string $rolename
     * @return Role
     */
    protected function createRole($rolename)
    {
        /** @var RoleRepository $repository */
        $repository = $this->app['defender.role'];

        $role = $repository->create($rolename);

        $this->seeInDatabase(
            config('defender.role_table', 'roles'),
            ['name' => $rolename]
        );

        return $role;
    }

    /**
     * Create and Attach a Role to User.
     * @param string     $role Role name.
     * @param User|array $user User or array of where clausules.
     * @return array Array containing $role and $user created.
     */
    protected function createAndAttachRole($role, $user)
    {
        $role = $this->createRole($role);

        if (!($user instanceof User)) {
            $user = User::where($user)->first();
        }

        $role->users()->attach($user);

        $this->seeRoleAttachedToUserInDatabase($role, $user);

        return [$role, $user];
    }

    /**
     * Assert to see in Database a Role attached to User.
     * @param Role $role
     * @param User $user
     */
    protected function seeRoleAttachedToUserInDatabase(Role $role, User $user)
    {
        $this->seeInDatabase(
            config('defender.role_user_table', 'role_user'),
            [
                config('defender.role_key', 'role_id') => $role->id,
                'user_id' => $user->id,
            ]
        );
    }

    /**
     * Assert to not see in Database a Role attached to User.
     * @param Role $role
     * @param User $user
     */
    protected function notSeeRoleAttachedToUserInDatabase(Role $role, User $user)
    {
        $this->notSeeInDatabase(
            config('defender.role_user_table', 'role_user'),
            [
                config('defender.role_key', 'role_id') => $role->id,
                'user_id' => $user->id,
            ]
        );
    }

    /**
     * @inheritdoc
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            'Artesaos\Defender\Providers\DefenderServiceProvider',
        ];
    }
}
