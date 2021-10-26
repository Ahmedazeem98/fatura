<?php

namespace App\helpers;


use App\Role;

class UserHelper
{
    public static function UserRolesToArray($user_roles)
    {
        $roles = [];
        foreach ($user_roles as $role)
        {
            $roles [] = $role['name'];
        }
        return$roles;
    }

}
