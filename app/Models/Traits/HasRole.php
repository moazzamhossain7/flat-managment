<?php

namespace App\Models\Traits;

trait HasRole
{
    /**
     * Check User has role
     * @param  string | Array  $role
     * @return boolean
     */
    public function hasRole($role)
    {
        if (is_null($role) || empty($role)) {
            return false;
        }

        $roles = explode(':', $this->actingAs($this->role));

        if (is_string($role)) {
            if (!$roles) {
                return false;
            }

            return in_array($role, $roles);
        }

        if (is_array($role)) {
            foreach ($role as $r) {
                if ($this->hasRole($r)) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Check user has super-admin role
     * @return boolean
     */
    public function isSuperAdmin()
    {
        return $this->actingAs($this->role) === 'super_admin';
    }

    /**
     * Check user has landlord role
     * @return boolean
     */
    public function isLandlord()
    {
        return $this->actingAs($this->role) === 'landlord';
    }

    /**
     * Check user has tenant roles
     * @return boolean
     */
    public function isTenant()
    {
        return $this->actingAs($this->role) === 'tenant';
    }

    /**
     * check is logged in user is active
     *
     * @return boolean
     */
    public function isActive()
    {
        return $this->status === true;
    }

    /**
     * Compare role based on logged in / impersonate user
     *
     * @param string $role
     * @return string
     */
    protected function actingAs($role)
    {
        if (session()->has('impersonateUser')) {
            return session('impersonateUser.role');
        }

        return $role;
    }
}
