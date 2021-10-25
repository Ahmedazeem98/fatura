<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class PostPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return !empty($user->roles->whereIn('name',['admin','author'])->first());
    }

    public function edit(User $user, Post $post)
    {
        return $user->id == $post->user_id || Gate::allows('isAdmin');
    }

    public function update(User $user, Post $post)
    {
        return $user->id == $post->user_id || Gate::allows('isAdmin');
    }

    public function delete(User $user, Post $post)
    {
        return $user->id == $post->user_id || Gate::allows('isAdmin');
    }
}
