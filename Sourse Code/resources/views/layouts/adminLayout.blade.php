<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <link href={{asset("admin_assets/css/bootstrap.css")}} rel="stylesheet" type="text/css" media="all">
    <!-- Custom Theme files -->
    <link href={{asset("admin_assets/css/style.css")}} rel="stylesheet" type="text/css" media="all"/>
    <!--js-->
    <script src={{asset("admin_assets/js/jquery-2.1.1.min.js")}}></script>
    <!--icons-css-->
    <link href={{asset("admin_assets/css/font-awesome.css")}} rel="stylesheet">
    <!--Google Fonts-->
    <link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
    <!--static chart-->
    <script src={{asset("admin_assets/js/Chart.min.js")}}></script>
    <link href={{asset("assets/images/favicon.png")}} rel="icon" type="image/png">

    <!--//charts-->
    <!-- geo chart -->
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
    <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
    <!-- Chartinator  -->
    <script src={{asset("admin_assets/js/chartinator.js")}} ></script>
    <script type="text/javascript">
        jQuery(function ($) {

            var chart3 = $('#geoChart').chartinator({
                tableSel: '.geoChart',

                columns: [{role: 'tooltip', type: 'string'}],

                colIndexes: [2],

                rows: [
                    ['China - 2015'],
                    ['Colombia - 2015'],
                    ['France - 2015'],
                    ['Italy - 2015'],
                    ['Japan - 2015'],
                    ['Kazakhstan - 2015'],
                    ['Mexico - 2015'],
                    ['Poland - 2015'],
                    ['Russia - 2015'],
                    ['Spain - 2015'],
                    ['Tanzania - 2015'],
                    ['Turkey - 2015']],

                ignoreCol: [2],

                chartType: 'GeoChart',

                chartAspectRatio: 1.5,

                chartZoom: 1.75,

                chartOffset: [-12,0],

                chartOptions: {

                    width: null,

                    backgroundColor: '#fff',

                    datalessRegionColor: '#F5F5F5',

                    region: 'world',

                    resolution: 'countries',

                    legend: 'none',

                    colorAxis: {

                        colors: ['#679CCA', '#337AB7']
                    },
                    tooltip: {

                        trigger: 'focus',

                        isHtml: true
                    }
                }


            });
        });
    </script>
    <!--geo chart-->

    <!--skycons-icons-->
    <script src={{asset("admin_assets/js/skycons.js")}}></script>
    <!--//skycons-icons-->
</head>
<body>
<div class="page-container">
    <div class="left-content">
        <div class="mother-grid-inner">
            <!--header start here-->
            <div class="header-main">
                <div class="header-left">
                    <div class="logo-name">
                        <a href="{{url('/')}}"> <h1><span style="color: #010101">Senior</span>Tech</h1>
                            <!--<img id="logo" src="" alt="Logo"/>-->
                        </a>
                    </div>
                </div>
                <div class="header-right">
                    <div class="profile_details">
                        <ul>
                            <li class="dropdown profile_details_drop">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <div class="profile_img">
                                        @php $image = Auth::guard("admin")->user()->image; @endphp
                                        <span class="prfil-img"><img src={{asset("admin_assets/images/avatars/$image")}} alt="" width="40" style="border-radius:50%"> </span>
                                        <div class="user-name">
                                            <p>{{Auth::guard("admin")->user()->name}}</p>
                                            <span>{{Auth::guard("admin")->user()->type}}</span>
                                        </div>
                                        <i class="fa fa-angle-down lnr"></i>
                                        <i class="fa fa-angle-up lnr"></i>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu drp-mnu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            logout
                                        </a>

                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                    {{--                                    <li> <a href="#"><i class="fa fa-sign-out"></i> Logout</a> </li>--}}
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <!--heder end here-->
            <!-- script-for sticky-nav -->
            <script>
                $(document).ready(function() {
                    var navoffeset=$(".header-main").offset().top;
                    $(window).scroll(function(){
                        var scrollpos=$(window).scrollTop();
                        if(scrollpos >=navoffeset){
                            $(".header-main").addClass("fixed");
                        }else{
                            $(".header-main").removeClass("fixed");
                        }
                    });

                });
            </script>
            <!-- /script-for sticky-nav -->

            <!--inner block start here-->
            <div class="inner-block" style="height: 100vh">
                @yield('content')
            </div>

            <!--inner block end here-->

        </div>
    </div>
    <!--slider menu-->
    <div class="sidebar-menu">
        <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars" style="color: #fff"></span> </a> <a href="#"> <span id="logo" ></span>
                <!--<img id="logo" src="" alt="Logo"/>-->
            </a> </div>
        <div class="menu">
            <ul id="menu" >

                <div class="{{request()->getRequestUri() == '/admin' ? 'active': ''}}">
                    <li id="menu-home" ><a href="{{url('/admin')}}"><i class="fa fa-tachometer"
                            ></i><span>Dashboard</span></a>
                    </li>
                </div>

                @if(Auth::user()->type == 'super admin')

                <div class="{{(request()->getRequestUri() == '/admin/manageAdmin/create' || request()->getRequestUri() == '/admin/manageAdmin') ? 'active': ''}}">
                    <li><a><i class="fa fa-user"></i><span>Manage admins</span><span class="fa fa-angle-right" style="float: right"></span></a>
                        <ul>
                            <li><a href="{{ route('admin.manageAdmin.create')}}" style="color:{{request()->getRequestUri() == '/admin/manageAdmin/create' ? '': 'white'}}">Add admin</a></li>
                            <li><a href="{{url('admin/manageAdmin')}}" style="color:{{request()->getRequestUri() == '/admin/manageAdmin' ? '': 'white'}}">View admins</a></li>
                        </ul>
                    </li>
                </div>

                @endif

                <div class="{{(request()->getRequestUri() == '/admin/manageUser' || request()->getRequestUri() == '/admin/manageUser/create') ? 'active': ''}}">
                    <li><a><i class="fa fa-users"></i><span>Manage users</span><span class="fa fa-angle-right" style="float: right"></span></a>
                        <ul>

                            <li><a href="{{url('admin/manageUser/create')}}" style="color:{{request()->getRequestUri() == '/admin/manageUser/create' ? '': 'white'}}">Add user</a></li>
                            <li><a href="{{url('admin/manageUser')}}" style="color:{{request()->getRequestUri() == '/admin/manageUser' ? '': 'white'}}">View users</a></li>
                        </ul>
                    </li>
                </div>

                <div class="{{(request()->getRequestUri() == '/admin/managePage' || request()->getRequestUri() == '/admin/managePage/create') ? 'active': ''}}">
                    <li><a><i class="fa fa-files-o"></i><span>Manage pages</span><span class="fa fa-angle-right" style="float: right"></span></a>
                        <ul>
                            <li><a href="{{url('admin/managePage/create')}}" style="color:{{request()->getRequestUri() == '/admin/managePage/create' ? '': 'white'}}">Add course</a></li>
                            <li><a href="{{url('admin/managePage')}}" style="color:{{request()->getRequestUri() == '/admin/managePage' ? '': 'white'}}">View pages</a></li>
                        </ul>
                    </li>
                </div>

                <div class="{{(request()->getRequestUri() == '/admin/managePost' || request()->getRequestUri() == '/admin/managePost/create') ? 'active': ''}}">
                    <li><a><i class="fa fa-file"></i><span>Manage posts</span><span class="fa fa-angle-right" style="float: right"></span></a>
                        <ul>
                            <li><a href="{{url('admin/managePost/create')}}" style="color:{{request()->getRequestUri() == '/admin/managePost/create' ? '': 'white'}}">Add posts</a></li>
                            <li><a href="{{url('admin/managePost')}}" style="color:{{request()->getRequestUri() == '/admin/managePost' ? '': 'white'}}">View posts</a></li>
                        </ul>
                    </li>
                </div>


            </ul>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
    var toggle = true;

    $(".sidebar-icon").click(function() {
        if (toggle)
        {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({"position":"absolute"});
        }
        else
        {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
                $("#menu span").css({"position":"relative"});
            }, 400);
        }
        toggle = !toggle;
    });
</script>
<!--scrolling js-->
{{--<script src={{asset("admin_assets/js/jquery.nicescroll.js")}}></script>--}}
<script src={{asset("admin_assets/js/scripts.js")}}></script>
<!--//scrolling js-->
<script src={{asset("admin_assets/js/bootstrap.js")}}> </script>
<script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
<script>CKEDITOR.replace('article-ckeditor');</script>
<!-- mother grid end here-->
</body>
</html>
