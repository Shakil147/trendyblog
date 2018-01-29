@extends('admin.master')

@section('title')
    Manage Comments
@endsection

@section('banner')
    Manage Comments
@endsection
@section('body')
    <div class="content-top">

        <div class="col-sm-offset-12 col-sm-offset-0">

            <div class="well">
                <table class="table table-bordered">
                    <tr>
                        <th>Comments Id</th>
                        <th>Blog id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment's Description</th>
                        <th>Action</th>
                    </tr>
                    @foreach($Comments as $Comments)
                        <tr>
                            <td>{{ $Comments->id }}</td>
                            <td>{{ $Comments->blog_id }}</td>
                            <td>{{ $Comments->full_name }}</td>
                            <td>{{ $Comments->email }}</td>
                            <td>{{ $Comments->comment_description }}</td>
                            <td>
                                @if($Comments->publication_status == 1)
                                    <a href="{{ url('/commants-unpublished/'.$Comments->id) }}" class="btn btn-success btn-xs" title="Published Comments">
                                        <span class="fa fa-minus-square-o"></span>
                                    </a>
                                @else
                                    <a href="{{ url('/commants-published/'.$Comments->id) }}" class="btn btn-warning btn-xs" title="Published Comments">
                                        <span class="fa fa-minus-square-o"></span>
                                    </a>
                                @endif
                                <a href="{{ url('/commants-delete/'.$Comments->id) }}" class="btn btn-danger btn-xs" title="Delete Category" onclick="return confirm('Are you sure to delete this'); ">
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