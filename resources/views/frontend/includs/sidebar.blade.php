<aside class="col-md-4 col-sm-8 col-xs-8">
    <div class="sidebar">

        <!-- search option -->
        <div class="search-widget">
            <div class="input-group margin-bottom-sm">
                <input class="form-control" type="text" placeholder="Search here">
                <a href="#" class="input-group-addon">
                    <i class="fa fa-search fa-fw"></i>
                </a>
            </div>
        </div>

        @foreach($lastblog as $lastblog)
        <a href="{{ url('/blogs/'.$lastblog->id) }}" class="template-images">

            <img class="img-responsive" src="{{ asset($lastblog->blog_image) }}" alt="Template Store">
            <h1>
                <a href="{{ url('/blogs/'.$lastblog->id) }}">{!! $lastblog->blog_title !!}</a>
            </h1>
                <div class="overlay"></div>
        </a>
        @endforeach

        <!-- subscribe form -->
        <div class="subscribe-widget">
            <h4 class="text-capitalize text-center">
                get recent update by email
            </h4>
            <div class="input-group margin-bottom-sm">
                <input class="form-control" type="text" placeholder="Your Email">
                <a href="#" class="input-group-addon">
                    <i class="fa fa-paper-plane fa-fw"></i>
                </a>
            </div>
        </div>

        <!-- sidebar share button -->
        <div class="share-widget hidden-xs hidden-sm">
            <ul class="social-share text-center">
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul> <!-- /.sidebar-share-button -->
        </div> <!-- /.share-widget -->

    </div>
</aside>