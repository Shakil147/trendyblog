@extends('admin.master')
@section('title')
    Add Blog
@endsection

@section('banner')
    Add Blog
@endsection

@section('body')


    <div class="content-top">
            <div class="well">
                <section class="panel">

                <div class="panel-body">
                    <div class=" form">
                        {{ Form::open(['url'=>'/blog/new', 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) }}
                        <div class="form-group ">
                            <label for="cname" class="col-sm-2 control-label">Blog Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="blog_title"  type="text" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="selector1" class="col-sm-2 control-label">Select Category</label>
                            <div class="col-sm-10"><select name="category_id"  class="form-control1">
                                    <option>---Select Category---</option>
                                    @foreach($PublishedCategories as $PublishedCategories)
                                        <option value="{{ $PublishedCategories->id }}">{{ $PublishedCategories->category_name }}</option>
                                    @endforeach
                                </select></div>
                        </div>
                        <div class="form-group">
                            <label for="txtarea1" class="col-sm-2 control-label">Short Description</label>
                            <div class="col-sm-10"><textarea1 name="blog_short_description"  class="form-control1" ></textarea1></div>
                        </div>
                        <div class="form-group" >
                            <label for="txtarea1" class="col-sm-2 control-label">Blog</label>
                            <div class="col-sm-10" ><textarea1 name="blog_description"   class="form-control1"></textarea1></div>
                        </div>
                        <div class="form-group">
                            <label for="cname" class="col-sm-2 control-label">Blog Image</label>
                            <input type="file" name="blog_image" accept="image/*" >
                        </div>

                        <div class="form-group">
                            <label for="selector1" class="col-sm-2 control-label">Publication Status</label>
                            <div class="col-sm-10">

                                <select name="publication_status"  class="form-control1">
                                    <option >----Publication Status----</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Save Blog</button>
                                <button class="btn btn-default" type="reset">Reset</button>
                            </div>
                        </div>
                        {{--</form>--}}
                        {{ Form::close() }}
                    </div>

                </div>
            </section>
        </div>
    </div>

    </div>

@endsection


