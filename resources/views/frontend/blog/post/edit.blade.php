@extends('layouts.app')

@section('content')

    <form method="post" action="{{route('front.posts.update',['post' => $post->id])}}">

        @csrf
        {{ method_field('PUT') }}

        <div class="form-group fw-bold">

            <label>Post title</label>
            <input required type="text" name="title" class="form-control" value="{{$post->title}}">
        </div>
        <div class="form-group fw-bold">
            <label for="exampleFormControlTextarea1">Post body</label>
            <textarea required name="body" class="form-control" rows="6">{{$post->body}}</textarea>
        </div>

        <input type="hidden" name="user_id" value="{{auth()->id()}}">
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <button type="submit" class="btn btn-primary">Update</button>

    </form>
@endsection
