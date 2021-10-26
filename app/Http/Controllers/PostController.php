<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use App\helpers\SlugHelper;

class PostController extends Controller
{
    protected $paginateNumber = 15;

    public function index(Request $request)
    {
        $posts = Post::with('user')
            ->orderBy('created_at','desc');

        if($request->query->has('user'))
            $posts->where('user_id', $request->user);

        $posts = $posts->paginate($this->paginateNumber);

        return view('blog.index', compact('posts'));
    }

    public function create()
    {
        $this->authorize('create', Post::class);
        return view('blog.post.create');
    }

    public function store(Request $request)
    {
        SlugHelper::slugHandling($request);

        $this->validator($request);
        Post::create([
            'title' => $request->title,
            'slug' =>$request->slug,
            'body' => $request->body,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('blog.index')
            ->with('success','Post added successfully');
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $this->authorize('edit', $post);
        return view('blog.post.edit', compact('post'));
    }

    public function update(Request $request, $post_id)
    {
        $post = Post::findOrFail($post_id);
        $this->authorize('update', $post);

        SlugHelper::slugHandling($request);
        $this->validator($request);
        $post->update($request->all());

        return redirect()->route('blog.index')
            ->with('success','Post updated successfully');
    }

    public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id);
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('blog.index')
            ->with('success','Post deleted successfully');

    }

    protected function validator($request)
    {
        $request->validate([
            'user_id' => 'required',
            'title' => 'required|string|min:6',
            'body' => 'required|string|min:15',
            'slug' => "unique:posts,slug,{$request->post_id},id"
        ],
        [
            'slug.unique' => 'The title has already been taken.'
        ]);
    }
}
