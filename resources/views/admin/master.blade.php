<!DOCTYPE HTML>
<html>
<head>
    <title>Trendy Blog :: @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="{{asset('admin')}}/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <link href="{{asset('admin')}}/css/style.css" rel='stylesheet' type='text/css' />
    <link href="{{asset('admin')}}/css/font-awesome.css" rel="stylesheet">
    <script src="{{asset('admin')}}/js/jquery.min.js"> </script>


    <!-- js -->
    <script src="{{asset('frontend')}}/js/jquery-1.11.1.min.js"></script>
    <!-- //js -->
    <link href='//fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <!-- Mainly scripts -->
    <script src="{{asset('admin')}}/js/jquery.metisMenu.js"></script>
    <script src="{{asset('admin')}}/js/jquery.slimscroll.min.js"></script>
    <!-- Custom and plugin javascript -->
    <link href="{{asset('admin')}}/css/custom.css" rel="stylesheet">
    <script src="{{asset('admin')}}/js/custom.js"></script>
    <script src="{{asset('admin')}}/js/screenfull.js"></script>
    <script>
        $(function () {
            $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

            if (!screenfull.enabled) {
                return false;
            }



            $('#toggle').click(function () {
                screenfull.toggle($('#container')[0]);
            });



        });
    </script>

 

    <script src="{{asset('admin')}}/js/pie-chart.js" type="text/javascript"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });


        });

    </script>
    <!--skycons-icons-->
    <script src="{{asset('admin')}}/js/skycons.js"></script>
    <!--//skycons-icons-->
</head>
<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-top" role="navigation">
    @include('admin.includs.hader')

    <!----->
        <!-- /.navbar-collapse -->
        <div class="clearfix">

        </div>

        @include('admin.includs.sidbar')
    </nav>
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">
            <!--banner-->
            <div class="banner">

                <h2>
                    <a href="{{url('/home')}}">Home</a>
                    <i class="fa fa-angle-right"></i>
                    <span>@yield('banner')</span>
                    @if($message = Session::get('message'))
                        <h1 class="text-center text-success">{{ $message }}</h1>
                    @endif
                </h2>

            </div>

            @yield('body')
            
        </div>
        @include('admin.includs.footer')
    </div>

</div>
<!---->
<!--scrolling js-->

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({ selector:'textarea1' });
    </script>
<script src="{{asset('admin')}}/js/jquery.nicescroll.js"></script>
<script src="{{asset('admin')}}/js/scripts.js"></script>
<!--//scrolling js-->
<script src="{{asset('admin')}}/js/bootstrap.min.js"> </script>
</body>
</html>