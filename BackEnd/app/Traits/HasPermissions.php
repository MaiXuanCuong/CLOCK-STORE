<?php
namespace App\Traits;

use App\Models\Role;

trait HasPermissions
{
    protected $permissionList = null;

    public function userCan($permission = null){
        return $this->hasPermission($permission);
    }
    public function hasPermission($permission = null)
    {
        if (is_null($permission)) {
            return $this->getPermissions()->count() > 0;
        }

        if (is_string($permission)) {
            return $this->getPermissions()->contains('name', $permission);
        }

        return false;
    }

    private function getPermissions()
    {
        $this->permissionList = $this->groups->roles;
        return $this->permissionList ?? collect();
    }
}
