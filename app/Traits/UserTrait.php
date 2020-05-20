<?php


namespace App\Traits;


use App\Models\Security\Role;

trait UserTrait
{
    public function roles() {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    // Permission
    public function havePermission($permission) {
        foreach ($this->roles as $role) {
            if ($role['full_access'] == 'yes') {
                return true;
            }

            foreach ($role->permissions as $perm) {
                if ($perm->slug == $permission) {
                    return true;
                }
            }
        }
        return false;
    }
}
