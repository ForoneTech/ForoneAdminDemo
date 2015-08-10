<?php

namespace Artesaos\Defender\Traits\Users;

use Artesaos\Defender\Pivots\PermissionUserPivot;
use Artesaos\Defender\Traits\Permissions\InteractsWithPermissions;
use Illuminate\Database\Eloquent\Model;

/**
 * Trait HasPermissions.
 */
trait HasPermissions
{
    use InteractsWithPermissions;

    /**
     * Many-to-many permission-user relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(
            config('defender.permission_model'),
            config('defender.permission_user_table'),
            'user_id',
            config('defender.permission_key')
        )->withPivot('value', 'expires');
    }

    /**
     * @param Model  $parent
     * @param array  $attributes
     * @param string $table
     * @param bool   $exists
     *
     * @return PermissionUserPivot
     */
    public function newPivot(Model $parent, array $attributes, $table, $exists)
    {
        $permissionModel = app()['config']->get('defender.permission_model');

        if ($parent instanceof $permissionModel) {
            return new PermissionUserPivot($parent, $attributes, $table, $exists);
        }

        return parent::newPivot($parent, $attributes, $table, $exists);
    }
}
