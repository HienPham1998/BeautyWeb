<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('client/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('client/assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Material Kit by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('admin/assets/css/material-dashboard.css?v=2.1.1')}}" rel="stylesheet" />
    <link href="{{ asset('client/assets/css/material-kit.css?v=2.0.5') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('client/assets/demo/demo.css') }}" rel="stylesheet" />
</head>

<body class="landing-page sidebar-collapse">
@if(session()->has("success"))
<div class="alert alert-secondary alert-dismissible fade show " style="position: fixed; z-index: 999; right: 40%; top: -40%;">
    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" role="img"
        style="width:30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
        class="svg-inline--fa fa-check-circle fa-w-16 fa-3x">
        <path fill="currentColor"
            d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"
            class=""></path>
    </svg>
    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
        <!-- <i class="nc-icon nc-simple-remove"></i> -->
        <i class="material-icons">close</i>
    </button>
    <span> {{ session("success") }}</span>
</div>
@endif
    <div class="fixed-top">
        <div class="navbar  navbar-expand-lg navbar-transparent navbar-color-on-scroll d-flex flex-column"
            color-on-scroll="100" id="sectionsNav">
            <div class="container-fluid">
                <div class="navbar-translate">
                    <h3>
                        <a class="my-logo text-white" href="/"> TuHiDu Cosmetics</a> </h3>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item text-right">
                            <a href="/cart" class="text-white"><svg style="width:15%" aria-hidden="true"
                                    focusable="false" data-prefix="fas" data-icon="shopping-cart" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                    class="svg-inline--fa fa-shopping-cart fa-w-18 fa-3x">
                                    <path fill="currentColor"
                                        d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z"
                                        class=""></path>
                                </svg>
                            </a>
                        </li>
                        @if(Auth::user())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                                href="javascript:void(0)">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu dropdown-menu-right dropdown-danger">
                                <a class="dropdown-item" href=""><i class="nc-icon nc-single-02"></i>&nbsp; Profile</a>
                                <!-- <a class="dropdown-item" href="blog-posts.html"><i
                                        class="nc-icon nc-bullet-list-67"></i>&nbsp; My posts</a> -->
                                <a class="dropdown-item" href="/logout"><i class="nc-icon nc-bookmark-2"></i>&nbsp;
                                    Logout</a>
                            </ul>
                        </li>
                        @else

                        <li class="nav-item">
                            <a class="nav-link" href="/login">
                                Log in
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">
                                Register
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">
                                Contact us
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <nav class="menu">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a href="/" class="nav-link">Home </a></li>
                    @foreach($categories as $category)
                    <li class="nav-item"><a href="/categories/{{ $category->id }}" class="nav-link">
                            {{$category->name}}
                        </a></li>
                    @endforeach
                    <li>
                        <form action="" method="GET" class="form-group form-inline bmd-form-group" id="search">
                            @csrf
                            <input type="search" value="{{ request()->search }}" name="search" class="form-control"
                                placeholder="Search">
                            <button class="btn btn-round btn-fab btn-raised btn-white">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="page-header header-filter" data-parallax="true"
        style="background-image: url('{{asset('client/assets/image/bgr-top.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="title"></h1>
                    <h4></h4>
                    <br>

                </div>
            </div>
        </div>
    </div>
    @yield('content')
    <footer class="footer footer-default " id="contact" style="background-color:#f1d8dd;padding-bottom:100px">
        <div class="container">
            <div class="row">
                <div class="col-4 text-left" style="color:#111">
                    <b>
                        <h2>TuHiDu Cosmetics</h2>
                        <p>Address : 123 ,Hai Ba Trung ,Ha Noi, VietNam</p>
                        <p>Email : TuHiDuCosmetics@gmail.com</p>
                        <p>Phone: 0982474272</p>
                    </b>
                </div>
                <div class="col-4">
                    <h3>Video Clip</h3>
                    <hr>
                    <div>

                        <iframe width="100%" height="250px" src="https://www.youtube.com/embed/fOyAyfxOIDo"
                            frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>

                </div>
                <div class="col-4 ">
                    <h3>Facebook-FanPage</h3>
                    <hr>

                    <div class="fb-page"
                        data-href="https://www.facebook.com/Tuhidu-Cosmetics-101659421201829/?modal=admin_todo_tour"
                        data-tabs="timeline" data-width="300" data-height="70" data-small-header="false"
                        data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote
                            cite="https://www.facebook.com/Tuhidu-Cosmetics-101659421201829/?modal=admin_todo_tour"
                            class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/Tuhidu-Cosmetics-101659421201829/?modal=admin_todo_tour">Tuhidu
                                Cosmetics</a></blockquote>
                    </div>
                </div>

            </div>
        </div>

    </footer>
    <!--   Core JS Files   -->
    <script src="{{ asset('client/assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('client/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('client/assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('client/assets/js/plugins/moment.min.js') }}"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="{{ asset('client/assets/js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('client/assets/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('client/assets/js/material-kit.js?v=2.0.5x') }}" type="text/javascript"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0">
    </script>

</body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0">
</script>

</html>
