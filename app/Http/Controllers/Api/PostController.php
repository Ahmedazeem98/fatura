<?php

namespace App\Http\Controllers\Api;

use App\helpers\slugHelper;
use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

    public function store(Request $request)
    {
        slugHelper::slugHandling($request);

        $validate = $this->validator($request->all());
        if($validate->fails())
        {
            return $this->apiResponse(null, $validate->errors(), 422);
        }

        $post = Post::create($request->all());
        if($post)
            return $this->apiResponse(new PostResource($post), null, 200);
        else
            return $this->apiResponse([], 'Post can\'t be created', 200);
    }

    public function update(Request $request)
    {
        slugHelper::slugHandling($request);

        $validate = $this->validator($request->all());
        if($validate->fails()) {
            return $this->apiResponse(null, $validate->errors(), 422);
        }

        $post = Post::find($request->post_id);

        if(!$post)
            return $this->notFoundResponse();

        $post->update($request->all());

        if($post)
            return $this->apiResponse(new PostResource($post),null,200);

        return $this->apiResponse(null,'Unknown error',200);
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
            'slug' => "unique:posts,slug,{$data['post_id']},id"
        ],
            [
                'slug.unique' => 'The title has already been taken.'

        ]);
    }
}
