@extends('admin.master')

@section('title')
    Manage Category
@endsection

@section('banner')
    Manage Category
@endsection
@section('body')
    <div class="content-top">

        <div class="col-sm-offset-12 col-sm-offset-0">

            <div class="well">
                <table class="table table-bordered">
                    <tr>
                        <th>Category Id</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Publication status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($allCategories as $allCategory)
                        <tr>
                            <td>{{ $allCategory->id }}</td>
                            <td>{{ $allCategory->category_name }}</td>
                            <td>{{ $allCategory->category_description }}</td>
                            <td>{{ $allCategory->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                            <td>
                                <a href="{{ url('/category/edit/'.$allCategory->id) }}" class="btn btn-primary btn-xs" title="Edit Category">
                                    <span class="fa   fa-pencil"></span>
                                </a>
                                <a href="{{ url('/category/delete/'.$allCategory->id) }}" class="btn btn-danger btn-xs" title="Delete Category" onclick="return confirm('Are you sure to delete this'); ">
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