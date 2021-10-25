<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        $roles = ['user','author', 'admin'];
        foreach ($roles as $role)
        {
            Role::create(['name' => $role]);
        }
    }
}
