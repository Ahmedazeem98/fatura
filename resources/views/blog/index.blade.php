@extends('layouts.app')

@section('content')
    <div class="row g-5">
        <div class="col-md-12">
            @foreach($posts as $post)
                <article class="blog-post">
                    <h2 class="blog-post-title">{{$post->title}}</h2>
                    <p class="blog-post-meta">
                        <b>{{$post->created_at->diffForHumans()}}</b> by <a href="{{route('blog.index').'?user='.$post->user_id}}">{{$post->user->name}}</a>
                    </p>
                    <p>{{$post->body}}</p>

                        @if(Gate::forUser(auth()->user())->allows('isMyPost', $post))
                            <div class="btn-group btn-group-sm mb-4" role="group">
                                <a class="btn btn-primary mr-2" href="{{route('posts.edit', ['post' => $post])}}" role="button">edit</a>

                                {!! Form::open(['route' => ['posts.destroy','post' => $post->id], 'method' => 'delete']) !!}
                                    {{ Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}
                                {!! Form::close() !!}
                            </div>
                        @endif

                </article>
            @endforeach
                <div class="d-flex justify-content-center">{{$posts->links()}}</div>

        </div>

    </div>

@endsection
