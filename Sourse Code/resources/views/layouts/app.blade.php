<!DOCTYPE html>
<html lang="en" class="bg-gray-100">

<!-- Mirrored from demo.foxthemes.net/socialitev2.0/form-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Mar 2021 14:46:22 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href={{asset("assets/images/favicon.png")}} rel="icon" type="image/png">

    <!-- Basic Page Needs
        ================================================== -->
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Socialite is - Professional A unique and beautiful collection of UI elements">

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href={{asset("assets/scss/icons.html")}}>

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href={{asset("assets/css/style.css")}}
    <link rel="stylesheet" href={{asset("assets/css/icons.css")}}>

    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">


    <style>
        .text-danger{
            color: lightcoral;
        }
        input , .bootstrap-select.btn-group button{
            background-color: #f3f4f6  !important;
            height: 44px  !important;
            box-shadow: none  !important;
        }
    </style>
</head>

<body class="bg-gray-100">


<div id="wrapper" class="flex flex-col justify-between h-screen">

    <!-- header-->
    <div class="bg-white py-4 shadow dark:bg-gray-800">
        <div class="max-w-6xl mx-auto">


            <div class="flex items-center lg:justify-between justify-around">

                <a href="trending.html">
                    <img src={{asset("assets/images/logo.png")}} alt="" class="w-32">
                </a>

                <div class="capitalize flex font-semibold hidden lg:block my-2 space-x-3 text-center text-sm">
                    @if(request()->getRequestUri() != '/admin/login')
                        <a href="{{url('/login')}}" class="{{request()->getRequestUri() == '/login' ? 'bg-purple-500 purple-500 px-6 py-3 rounded-md shadow text-white' : 'py-3 px-4' }}">Login</a>
                        <a href="{{url('/register')}}" class="{{request()->getRequestUri() == '/register' ? 'bg-purple-500 purple-500 px-6 py-3 rounded-md shadow text-white' : 'py-3 px-4' }}">
                            Register
                        </a>
                    @else
                        <a href="{{url('/')}}" class="py-3 px-4">Client Side</a>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <!-- Content-->
    <div>
        @yield('content')
    </div>

    <!-- Footer -->

    <div class="lg:mb-5 py-3 uk-link-reset"></div>

</div>


<!-- Javascript
 ================================================== -->
<script src={{asset("assets/js/jquery-3.3.1.min.js")}}></script>
<script src={{asset("assets/js/uikit.js")}}></script>
<script src={{asset("assets/js/simplebar.js")}}></script>
<script src={{asset("assets/js/custom.js")}}></script>
<script src={{asset("assets/js/bootstrap-select.min.js")}}></script>

</body>

</html>
