<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PostResource;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    use apiResponseTrait;
    public $paginateNumber = 10;

    public function index()
    {
        $post = PostResource::collection(Post::paginate($this->paginateNumber));
        return $this->apiResponse($post);
    }

    public function show($post_id)
    {
        $post = Post::find($post_id);

        if($post)
            return $this->apiResponse(new PostResource($post));

        return $this->notFoundResponse();
    }

    public function destroy($post_id){
        $post = Post::find($post_id);

        if($post){
            $post->delete();
            return $this->apiResponse();
        }
        return $this->notFoundResponse();
    }

    protected function validator($data)
    {
        return Validator::make($data,[
            'user_id' => 'required',
            'title' => 'required|string|min:6',
            'body' => 'required|string|min:15',
            'slug' => "unique:posts"
        ],
            [
                'slug.unique' => 'The title has already been taken.'

        ]);
    }
}
