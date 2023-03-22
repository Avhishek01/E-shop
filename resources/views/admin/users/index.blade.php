@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>Registerd-Users</h4>
                </div>
                <div class="card-body">
                        <table class="table">
                        <thead>
                            <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                           
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>
                                    <p style="margin-top:30px"><a class="btn btn-sm btn-success" href="{{url('view-users/'.$user->id ) }}">View</a></p>
                                    <p style="margin-top:30px"><a class="btn btn-sm btn btn-danger" href="{{url('destroy/'.$user->id ) }}"onclick="return confirm('Are you sure?')">Delete</a></p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


