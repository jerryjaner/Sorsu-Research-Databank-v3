<?php

namespace App\Traits;

trait HasPermissions
{
     protected function applyPermissions(): void
    {
        if (!property_exists($this, 'permissions') || !is_array($this->permissions)) {
            return;
        }

        foreach ($this->permissions as $permission => $methods) {
            $this->middleware("permission:{$permission}")->only($methods);
        }
    }
}
