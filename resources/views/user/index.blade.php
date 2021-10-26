@extends('layouts.app')

@section('content')
<table class="table table-striped table-hover mt-lg-5">
    <thead class="text-center">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Roles</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr class="text-center">
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <ul style="list-style: none">
                    @foreach($user->roles as $role)
                        <li>
                            {{$role->name}}
                        </li>
                    @endforeach
                </ul>
            </td>
            <td width="20%">
                <div class="btn-group btn-group-sm mb-4" role="group">
                    <a class="btn btn-primary mr-2" href="{{route('users.edit', ['user' => $user->id])}}" role="button">edit</a>

                    {!! Form::open(['route' => ['users.destroy','user' => $user->id], 'method' => 'delete']) !!}
                    {{ Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}
                    {!! Form::close() !!}
                </div>

            </td>

        </tr>
    @endforeach
    </tbody>
</table>
@endsection
