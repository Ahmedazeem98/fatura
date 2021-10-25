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
        User::truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();
        $authorRole = Role::where('name', 'author')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123')
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('user123')
        ]);

        $author = User::create([
            'name' => 'Author',
            'email' => 'author@author.com',
            'password' => Hash::make('author123')
        ]);

        $admin->roles()->sync([$adminRole->id, $userRole->id, $authorRole->id]);
        $user->roles()->sync($userRole);
        $author->roles()->sync($authorRole);
    }
}
