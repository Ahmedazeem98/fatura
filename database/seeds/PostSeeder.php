<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_user = \App\User::first();

        \App\Post::create([
           'title' => 'TechCrunch',
            'slug' => 'TechCrunch',
            'body' => 'TechCrunch has the latest news on gadgets and gizmos, apps, and tech events. To make sure you never miss an upload, download the TechCrunch app for your handheld device and enjoy news at your fingertips.',
            'user_id' => $admin_user->id
        ]);
    }
}
