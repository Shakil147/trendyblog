<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->

<html class="no-js"> <!--<![endif]-->
<head>

    <!-- meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>

    <!-- stylesheets -->
    <link rel="stylesheet" href="{{ asset('frontend')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend')}}/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('frontend')}}/assets/css/animate.css">
    <link rel="stylesheet" href="{{ asset('frontend')}}/assets/css/style.css">

</head>

<body>

@include('frontend.includs.navbar')

<main>
    <div class="container">
        <div class="row">

            @yield('content')

@include('frontend.includs.sidebar')


        </div>
    </div>
</main>

@include('frontend.includs.foooter')

<!--  Necessary scripts  -->

<script type="text/javascript" src="{{ asset('frontend')}}/assets/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="{{ asset('frontend')}}/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ asset('frontend')}}/assets/js/jQuery.scrollSpeed.js"></script>

<!-- smooth-scroll -->

<script>
    $(function() {
        jQuery.scrollSpeed(100, 1000);
    });
</script>

</body>
</html>