@extends('frontend.master')

@section('title')
    Trendy Blog :: Review
@endsection
@section('hade_bottom')
    <div class="banner1">

    </div>
@endsection

@section('content')

    <section class="contact-form">

        <div class="feedback">
            <div class="row">
                <div class="col-md-12">
                    <h1>feedback</h1>
                    @foreach($Review as $Review)
                        <div class="cmnt-clipboard"><span class="btn-clipboard">Reply</span></div>

                        <div class="well">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{ asset('frontend') }}/assets/img/resource-bg.jpg" class="img-responsive center-block">
                                </div>
                                <div class="col-md-10">
                                    <p class="comment-info">
                                        <strong>{{$Review->full_name}}</strong> <span>{{$Review->created_at->diffForHumans()}}</span>
                                    </p>
                                    <p>
                                        {{$Review->Review_description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @if($message = Session::get('message'))
            <h1 class="text-center text-success">{{ $message }}</h1>
        @endif
        <div class="col-md-12">
            <h1> make your Review</h1>
        <form action="{{ url('/review/new') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-8">

                    <div class="form-group">
                        <input  name="full_name" type="text" class="form-control" required="required" placeholder="Full Name">
                    </div>

                    <div class="form-group">
                        <input name="email" type="email" class="form-control" id="email"  placeholder="Email Address">
                    </div>

                </div>

                <div class="col-md-8">
                    <textarea name="Review_description" type="text" class="form-control"  rows="8" required="required" placeholder="Type here message"></textarea>
                </div>
            </div>

            <button type="submit" id="submit" name="submit" class="btn btn-contact">Save</button>

        </form>
        </div><!-- form end -->
    </section> <!-- /.contact-form -->

@endsection


