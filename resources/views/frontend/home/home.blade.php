@extends('frontend.master')

@section('title')
    Trendy Blog :: Home
@endsection

@section('content')
<section class="col-md-8">
    @foreach($blogs as $blog)

        <article class="blog-item">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ url('/blogs/'.$blog->id) }}">
                        <img src="{{ asset($blog->blog_image) }}" class="img-thumbnail center-block" alt="{{$blog->blog_title}}">
                    </a>
                </div>
                <div class="col-md-pull-8">
                    <p>  <a href="{{ url('/categorys/'.$blog->category_id) }}">{{ $blog->category_name }}</a></p>
                    <h1>
                        <a href="{{ url('/blogs/'.$blog->id) }}">{{$blog->blog_title}}</a>
                    </h1>
                    <p>{{  date('d/m/Y', strtotime($blog->created_at)) }}</p>
                </div>
            </div>
        </article>
    @endforeach
    {{$blogs->links()}}

</section>
    @endsection
