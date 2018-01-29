

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h1> <a class="navbar-brand" style="margin-top: 15px;" href="{{url('/')}}"><i>Trendy Blog</i></a>
            </h1>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="{{ url('/') }}">Home</a></li>

                @foreach($publishedCategories as $publishedCategories)
                <li><a href="{{ url('/categorys/'.$publishedCategories->id) }}">{{ $publishedCategories->category_name }}</a></li>
                @endforeach
                <li><a href="{{ url('/contact') }}">Contact</a></li>
                <li><a href="{{ url('/review') }}">Revews</a></li>
            </ul>
        </div><!-- end of /.navbar-collapse -->
    </div><!-- end of /.container -->
</nav>