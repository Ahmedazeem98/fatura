<?php

use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();
        $authorRole = Role::where('name', 'author')->first();

        $admin = User::create([
            'name' => 'Ahmed',
            'email' => 'admin@admin.com',
            'password' => Hash::make('pass123')
        ]);

        $user = User::create([
            'name' => 'Ali',
            'email' => 'user@user.com',
            'password' => Hash::make('pass123')
        ]);

        $author = User::create([
            'name' => 'Mohamed',
            'email' => 'author@author.com',
            'password' => Hash::make('pass123')
        ]);

        $admin->roles()->sync([$adminRole->id, $userRole->id, $authorRole->id]);
        $user->roles()->sync($userRole);
        $author->roles()->sync($authorRole);
    }
}
