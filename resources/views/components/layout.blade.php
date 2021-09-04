@props(['script' => null])
<!doctype html>
<html lang="en">

<!-- Mirrored from bootstrap.gallery/unify-dashboards/design-1/fixed-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Aug 2021 19:55:21 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Unify Admin Panel" />
    <meta name="keywords" content="Admin, Fixed Sidebar, Dashboard, Bootstrap4, Sass, CSS3, HTML5, Responsive Dashboard, Responsive Admin Template, Admin Template, Best Admin Template, Bootstrap Template, Themeforest" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="shortcut icon" href="/img/favicon.ico" />
    <title>Unify Admin Dashboard</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <!-- Common CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/fonts/icomoon/icomoon.css" />
    <link rel="stylesheet" href="/css/main.css" />

    <!-- C3 CSS -->
    <link rel="stylesheet" href="/vendor/c3/c3.min.css" />
{{-- For DataTable in jq --}}
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>

</head>
<body>

<!-- BEGIN .app-wrap -->
<div class="app-wrap">
    <!-- BEGIN .app-heading -->
    <header class="app-header">
        <div class="container-fluid">
            <div class="row gutters">
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-3 col-4">
                    <a class="mini-nav-btn" href="#" id="onoffcanvas-nav">
                        <i class="icon-menu5"></i>
                    </a>
                    <a href="#app-side" data-toggle="onoffcanvas" class="onoffcanvas-toggler" aria-expanded="true">
                        <i class="icon-chevron-thin-left"></i>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-4">
                    <a href="/" class="logo">
                        <img src="/img/unify.png" alt="Unify Admin Dashboard" />
                    </a>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-3 col-4">
                    <ul class="header-actions">
                        <li class="dropdown">
                            <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                                <img class="avatar" src="/img/user.png" alt="User Thumb" />
                                @auth
                                <span class="user-name">{{ auth()->user()->name }}</span>
                                <i class="icon-chevron-small-down"></i>
                                @endauth

                            </a>
                            <div class="dropdown-menu lg dropdown-menu-right" aria-labelledby="userSettings">
                                <ul class="user-settings-list">
                                    <li>
                                        @auth
                                        <a href="/users/{{ auth()->user()->id }}">
                                            <div class="icon">
                                                <i class="icon-account_circle"></i>
                                            </div>
                                            <p>Profile</p>
                                        </a>
                                        @endauth

                                    </li>
                                    <li>
                                        <a href="/">
                                            <div class="icon red">
                                                <i class="icon-cog3"></i>
                                            </div>
                                            <p>Dashboard</p>
                                        </a>
                                    </li>
                                </ul>
                                <div class="logout-btn">
                                    <form id="logout-form" method="POST" action="/logout">
                                        @csrf
                                        <button class="btn btn-primary">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- END: .app-heading -->

    <!-- BEGIN .app-container -->
    <div class="app-container">
        <!-- BEGIN .app-side -->
        <aside class="app-side fixed" id="app-side">
            <!-- BEGIN .side-content -->
            <div class="side-content ">
                <!-- BEGIN .user-profile -->
                <div class="user-profile">
                    <img src="/img/user.png" class="profile-thumb" alt="User Thumb">
                    @auth
                    <h6 class="profile-name">{{ auth()->user()->name }}</h6>

                    @endauth

                </div>
                <!-- END .user-profile -->
                <div class="sidebarNavScroll">
                    <!-- BEGIN .side-nav -->
                    <nav class="side-nav">
                        <!-- BEGIN: side-nav-content -->
                        <ul class="unifyMenu" id="unifyMenu">
                            <li class="{{ request()->is('/') ? 'selected' : '' }}">
                                <a href="/" aria-expanded="false">
                                    <span class="has-icon">
                                        <i class="icon-laptop_windows"></i>
                                    </span>
                                    <span class="nav-title">Dashboards</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('users') ? 'selected' : '' }}">
                                <a href="/users">
                                    <span class="has-icon">
                                        <i class="icon-border_outer"></i>
                                    </span>
                                    <span class="nav-title">All Users</span>
                                </a>
                            </li>
                        </ul>
                        <!-- END: side-nav-content -->
                    </nav>
                    <!-- END: .side-nav -->
                </div>
            </div>
            <!-- END: .side-content -->
        </aside>
        <!-- END: .app-side -->

        <!-- BEGIN .app-main -->
        <div class="app-main">
            <!-- BEGIN .main-heading -->
            <header class="main-heading">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                            <div class="page-icon">
                                <i class="icon-layers"></i>
                            </div>
                            <div class="page-title">
                                <h5>Dashboard</h5>
                                <h6 class="sub-heading">Welcome to Dashboard</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END: .main-heading -->
            <!-- BEGIN .main-content -->
            <div class="main-content">
            {{ $slot }}
            </div>
            <!-- END: .main-content -->
        </div>
        <!-- END: .app-main -->
    </div>
    <!-- END: .app-container -->
</div>
<!-- END: .app-wrap -->


<!-- jQuery first, then Tether, then other JS. -->
<script src="/js/jquery.js"></script>
<script src="/js/tether.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/vendor/unifyMenu/unifyMenu.js"></script>
<script src="/vendor/onoffcanvas/onoffcanvas.js"></script>
<script src="/js/moment.js"></script>

<!-- D3 JS -->
<script src="/vendor/d3/d3.min.js"></script>
<script src="/vendor/c3/c3.min.js"></script>
<!-- Common JS -->
<script src="/js/common.js"></script>
{{$script}}
</body>

<!-- Mirrored from bootstrap.gallery/unify-dashboards/design-1/fixed-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Aug 2021 19:55:23 GMT -->
</html>
