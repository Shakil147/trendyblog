@extends('admin.master')

@section('title')
    Manage Reviwes
@endsection

@section('banner')
    Manage Reviwes
@endsection
@section('body')
    <div class="content-top">

        <div class="col-sm-offset-12 col-sm-offset-0">

            <div class="well">
                <table class="table table-bordered">
                    <tr>
                        <th>Review Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Review Description</th>
                        <th>Action</th>
                    </tr>
                    @foreach($Review as $Review)
                        <tr>
                            <td>{{ $Review->id }}</td>
                            <td>{{ $Review->full_name }}</td>
                            <td>{{ $Review->email }}</td>
                            <td>{{ $Review->Review_description }}</td>
                            <td>
                                <a href="{{ url('/review-Reply/'.$Review->id) }}" class="btn btn-primary btn-xs" title="Mail Review">
                                    <span class="fa   fa-pencil"></span>
                                </a>
                                @if($Review->publication_status == 1)
                                    <a href="{{ url('/review/unpublished/'.$Review->id) }}" class="btn btn-success btn-xs" title="Published Review">
                                        <span class="fa fa-minus-square-o"></span>
                                    </a>
                                @else
                                    <a href="{{ url('/review/published/'.$Review->id) }}" class="btn btn-warning btn-xs" title="Published Review">
                                        <span class="fa fa-minus-square-o"></span>
                                    </a>
                                @endif
                                <a href="{{ url('/review/delete/'.$Review->id) }}" class="btn btn-danger btn-xs" title="Delete Review" onclick="return confirm('Are you sure to delete this'); ">
                                    <span class="fa fa-trash-o"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection