@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
                        <table class="table">
                        <thead>
                            <tr>
                                
                                <th>Parent Category</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cate as $cat)
                            <tr>
                                <td>{{ $cat->category_name}}</td>
                                <td>
                                    <img src="{{ url('image/category/'.$cat->image) }}" style="height: 100px; width: 100px;">
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-success btn-flat " href="{{url('edit/'.$cat->id ) }}">Edit</a>
                                    <a class="btn btn-sm btn btn-danger btn-flat" href="{{url('distroy/'.$cat->id ) }}">Delete</a>
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


