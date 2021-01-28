<?php

namespace App\Models\Traits;

use App\Models\Role;

trait Authorizable
{
    public function isAdmin()
    {
        return $this->roles->pluck('name')->contains('admin') ;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::whereName($role)->firstOrFail();
        }

        $this->roles()->sync($role, false);
    }

    public function abilities()
    {
        return $this->roles
            ->map
            ->abilities
            ->flatten()
            ->pluck('name')
            ->unique();
    }

    public function hasAbility($ability)
    {
        return $this->abilities()->contains($ability);
    }
}