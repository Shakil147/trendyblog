@extends('admin.master')

@section('title')
    Gallery
@endsection

@section('banner')
    Gallery
@endsection

@section('body')


<div class="gallery">
    @foreach($pic as $pic1)
    <div class="col-md">
        <div class="gallery-img">
            <a href="{{ asset($pic1->blog_image) }}" class="b-link-stripe b-animate-go  swipebox"  title="Image Title" >
                <img class="img-responsive " src="{{ asset($pic1->blog_image) }}" alt="" />
                <span class="zoom-icon"> </span> </a>
            </a>
        </div>
    </div>
    @endforeach
        <div class="clearfix"> </div>
</div>
    @endsection