@extends('layouts.app')

@section('content')
    <main class="signup-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Update User</h3>
                        <div class="card-body">

                            <form action="{{ route('users.update',['user' => $user->id]) }}" method="POST">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                                           required autofocus value="{{$user->name}}">
                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email_address" class="form-control"
                                           name="email" required autofocus value="{{$user->email}}">
                                </div>

                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control"
                                           name="password">
                                </div>

                                <div style="margin-top: 5%;margin-bottom: 5%" class="container mb-lg-2">
                                    <div class="list-group">
                                        @foreach($roles as $role)
                                            <label class="list-group-item">
                                                <input name="roles[{{$role['name']}}]" class="form-check-input me-1" {{ in_array($role->name, $user_roles) ? 'checked' : ''}} type="checkbox" value="{{$role->id}}">
                                                {{$role['name']}}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Update</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
