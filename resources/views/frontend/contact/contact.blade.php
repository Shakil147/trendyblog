@extends('frontend.master')

@section('title')
    Trendy Blog :: Contact
@endsection
@section('hade_bottom')
    <div class="banner1">

    </div>
@endsection

@section('content')

    <section class="contact-form">

        <h1>Contact </h1>
        <p>
            Welcome for contact us, if you have any question or want writing us or advertising here. Please kindly contact us by email <strong>info.technext@it</strong> or leave a reply here with form bellow. We will reply to you as soon as possible.
        </p>
        @if($message = Session::get('message'))
            <h1 class="text-center text-success">{{ $message }}</h1>
        @endif
        <form action="{{ url('/contact/new') }}" method="POST">
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
                    <textarea name="massage_description" type="text" class="form-control" id="message" rows="8" required="required" placeholder="Type here message"></textarea>
                </div>
            </div>

            <button type="submit" id="submit" name="submit" class="btn btn-contact">send message</button>

        </form> <!-- form end -->
    </section> <!-- /.contact-form -->

    @endsection