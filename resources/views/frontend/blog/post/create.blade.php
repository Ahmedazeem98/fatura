@extends('layouts.app')

@section('content')

    <form action="{{route('front.posts.store')}}" method="post">
        @csrf
        <div class="form-group fw-bold">
            <label>Post title</label>
            <input required type="text" name="title" value="{{ old('title')}}" class="form-control" placeholder="Enter post title">
        </div>
        <div class="form-group fw-bold">
            <label for="exampleFormControlTextarea1">Post body</label>
            <textarea required name="body" placeholder="Enter your post" class="form-control" rows="6">{{ old('body')}}</textarea>
        </div>
        <input type="hidden" name="user_id" value="{{auth()->id()}}">
        <button type="submit" class="btn btn-primary">Post</button>

    </form>
@endsection
