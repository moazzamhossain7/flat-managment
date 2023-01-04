<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Super admin
     * @param  User $user
     * @return boolean
     */
    public function isSuperAdmin(User $user)
    {
        return $user->isSuperAdmin();
    }

    /**
     * Landlord
     * @param  User $user
     * @return boolean
     */
    public function isLandlord(User $user)
    {
        return $user->isLandlord();
    }

    /**
     * Tenant
     * @param  User $user
     * @return boolean
     */
    public function isTenant(User $user)
    {
        return $user->isTenant();
    }

    /**
     * Check logged in user has access
     * @param  User $user
     * @return boolean
     */
    public function hasAccess(User $user, $abilities)
    {
        return $user->isLandlord() || $user->isTenant() || $this->hasPermissionToAccess($user, $abilities);
    }

    /**
     * Check has access permission
     */
    protected function hasPermissionToAccess(User $user, $abilities)
    {
        $abilities = explode('|', $abilities);
        foreach ($abilities as $ability) {
            $isTrue = $user->{$ability}();
            if ($isTrue) {
                return true;
            }
        }
        return false;
    }
}
