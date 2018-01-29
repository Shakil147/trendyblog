@extends('frontend.master')

@section('title')
    Trendy Blog :: Home
@endsection

@section('content')
    <section class="col-md-8">
        @foreach($categoryBlogs as $categoryBlogs)

            <article class="blog-item">
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ url('/blogs/'.$categoryBlogs->id) }}">
                            <img src="{{asset($categoryBlogs->blog_image)}}" class="img-thumbnail center-block" alt="{{$categoryBlogs->blog_title}}">
                        </a>
                    </div>
                    <div class="col-md-pull-8">
                        <p>
                            <time>{{$categoryBlogs->created_at->diffForHumans()}}</time></p>
                        <h1>
                            <a href="{{ url('/blogs/'.$categoryBlogs->id) }}">{{$categoryBlogs->blog_title}}</a>
                        </h1>{{  date('d/m/Y', strtotime($categoryBlogs->created_at)) }}
                    </div>
                </div>
            </article>
        @endforeach


    </section>
@endsection
