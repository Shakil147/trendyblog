@extends('frontend.master')

@section('title')
    Trendy Blog :: {{ $blogById->blog_title }}
@endsection

@section('content')
<section class="col-md-8">

    <article class="single-blog-item">

        <div class="alert alert-info">
            <p>{{  date('d/m/Y', strtotime($blogById->created_at)) }}
            <a href="{{ url('/categorys/'.$blogById->category_id) }}">{!! $blogById->category_name !!}</a></p>
        </div>
        <img class="img-responsive" src="{{asset($blogById->blog_image)}}" alt="Item number 1">

        <h1>{{$blogById->blog_title}}</h1>
        {!! $blogById->blog_description !!}
    </article>

    <div class="comment-post" >
        <h3>post a comment</h3>
        <form action="{{ url('/comment'.$blogById->id) }}" method="POST">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input  name="blog_id" type="hidden" class="form-control"  required="required" value="{{ $blogById->id }}">
                        <input  name="full_name" type="text" class="form-control" id="name" required="required" placeholder="Full Name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input name="email" type="email" class="form-control" id="email" required="required" placeholder="Email Address">
                    </div>
                </div>
                <div class="col-md-12">
                    <textarea name="comment_description" type="text" class="form-control" id="message" rows="5" required="required" placeholder="Type here message"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" required="required"> Please Check to Confirm
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" id="submit" name="submit" class="btn btn-cmnt">post comment</button>
                </div>
            </div>

        </form>
    </div>

    <div class="feedback">
        <div class="row">
            <h3>feedback</h3>
            @foreach($Comments as $Comment)
            <div class="col-md-12">
                
                <div class="cmnt-clipboard"><span class="btn-clipboard">Reply</span></div>
                <div class="well">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{asset('frontend')}}/assets/img/resource-bg.jpg" class="img-responsive center-block">
                        </div>
                        <div class="col-md-10">
                            <p class="comment-info">
                                <strong>{{ $Comment->full_name }} </strong> <span>22 april 2015</span>
                            </p>
                            <p>
                                {!! $Comment->comment_description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    
</section>
@endsection