<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

            <li>
                <a href="{{url('/home')}}" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboards</span> </a>
            </li>

            <li>
                <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Category Info</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{url('/category/add')}}" class=" hvr-bounce-to-right"> <i class="fa  fa-plus-square-o nav_icon"></i>Add Category</a></li>

                    <li><a href="{{url('/category/manage')}}" class=" hvr-bounce-to-right"><i class="fa  fa-gears (alias) nav_icon"></i>Manage Category</a></li>



                </ul>
            </li>
            <li>
                <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-weibo nav_icon"></i> <span class="nav-label">Blog Info</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{url('/blog/add')}}" class=" hvr-bounce-to-right"> <i class="fa  fa-plus-square-o nav_icon"></i>Add Blog</a></li>

                    <li><a href="{{url('/blog/manage')}}" class=" hvr-bounce-to-right"><i class="fa  fa-gears (alias) nav_icon"></i>Manage Blog</a></li>



                </ul>
            </li>

            <li>
                <a href="{{url('/commants-manage')}}" class=" hvr-bounce-to-right"><i class="fa fa-inbox nav_icon"></i> <span class="nav-label">Comments</span> </a>
            </li>

            <li>
                <a href="{{url('/contact/manage')}}" class=" hvr-bounce-to-right"><i class="fa fa-inbox nav_icon"></i> <span class="nav-label">Contact</span> </a>
            </li>

            <li>
                <a href="{{url('/review/manage')}}" class=" hvr-bounce-to-right"><i class="fa fa-inbox nav_icon"></i> <span class="nav-label">Reviews</span> </a>
            </li>

            <li>
                <a href="{{url('/gallery')}}" class=" hvr-bounce-to-right"><i class="fa fa-picture-o nav_icon"></i> <span class="nav-label">Gallery</span> </a>
            </li>

            <li>
                <a href="{{url('/compose')}}" class=" hvr-bounce-to-right"><i class="fa fa-picture-o nav_icon"></i> <span class="nav-label fa   fa-pencil">Compose</span> </a>
            </li>


            <li>
                <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-cog nav_icon"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="" onclick="event.preventDefault(); document.getElementById('logout').submit();"><i class="fa fa-sign-out nav_icon"></i> Logout</a>
                        <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>