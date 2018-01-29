@extends('admin.master')

@section('title')
    Manage Contact
@endsection

@section('banner')
    Manage Contact
@endsection
@section('body')
    <div class="content-top">

        <div class="col-sm-offset-12 col-sm-offset-0">

            <div class="well">
                <table class="table table-bordered">
                    <tr>
                        <th>Contact Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>MassageDescription</th>
                        <th>Action</th>
                    </tr>
                    @foreach($massage as $massage)
                        <tr>
                            <td>{{ $massage->id }}</td>
                            <td>{{ $massage->full_name }}</td>
                            <td>{{ $massage->email }}</td>
                            <td>{{ $massage->massage_description }}</td>
                            <td>
                                <a href="{{ url('/contact/reply/'.$massage->id) }}" class="btn btn-primary btn-xs" title="Reply Mail">
                                    <span class="fa   fa-pencil"></span>
                                </a>
                                <a href="{{ url('/contact/delete/'.$massage->id) }}" class="btn btn-danger btn-xs" title="Delete Category" onclick="return confirm('Are you sure to delete this'); ">
                                    <span class="fa  fa-trash-o"></span>
                                </a>
                                
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection