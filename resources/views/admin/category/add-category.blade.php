@extends('admin.master')

@section('title')
    Add Category
@endsection

@section('banner')
         Add Category
@endsection


@section('body')
            <div class="content-top">

                <div class="row">
                    <div class="col-sm-11 col-sm-offset-1">
                        <hr/>
                        <div class="well">
                            <form class="form-horizontal" action="{{ url('/category/new') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Category Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="category_name" class="form-control"/>
                                    </div>
                                </div><div class="form-group">
                                    <label class="control-label col-sm-3">Category Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="category_description" class="form-control" style="resize: vertical;"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Publication status</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="publication_status">
                                            <option>---Select Publication Status</option>
                                            <option value="1">Published</option>
                                            <option value="0">Unpublished</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Category Info"/>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection

