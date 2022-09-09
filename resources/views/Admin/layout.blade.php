<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title')</title>
    <!-- Fontfaces CSS-->
    <link href={{ url('/Admin_assets/css/font-face.css') }} rel="stylesheet" media="all" />
    <link href={{ url('/Admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css') }} rel="stylesheet"
        media="all" />
    <link href={{ url('/Admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css') }} rel="stylesheet"
        media="all" />
    <link rel="stylesheet" media="all" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">    
    <link href={{ url('/Admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css') }} rel="stylesheet"
        media="all" />
    <!-- Bootstrap CSS-->
    <link href={{ url('/Admin_assets/vendor/bootstrap-4.1/bootstrap.min.css') }} rel="stylesheet" media="all" />
    <!-- Main CSS-->
    <link href={{ url('/Admin_assets/css/theme.css') }} rel="stylesheet" media="all" />
</head>
<body>

    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <h2>Cool SEM</h2>
                            {{-- <img src={{ url('/Admin_assets/images/icon/logo.png') }} alt="CoolAdmin" /> --}}
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="@yield('dashboard-selected')">
                            <a href="{{ url('admin/dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="@yield('category-selected')">
                            <a href="{{ url('admin/category') }}">
                                <i class="fas fa-list"></i>Catogery</a>
                        </li>
                        <li class="@yield('coupon-selected')">
                            <a href="{{ url('admin/coupon') }}">
                                <i class="fas fa-tag"></i>Coupon</a>
                        </li>
                        <li class="@yield('size-selected')">
                            <a href="{{ url('admin/size') }}">
                                <i class="fas fa-window-maximize"></i>Size</a>
                        </li>
                        <li class="@yield('color-selected')">
                            <a href="{{ url('admin/color') }}">
                                <i class="fas fa-paint-brush"></i>Color</a>
                        </li>
                        <li class="@yield('product-selected')">
                            <a href="{{ url('admin/product') }}">
                            <i class="fas fa-tachometer-alt"></i>Product</a>
                        </li>
                        <li class="@yield('brand-selected')">
                            <a href="{{ url('admin/brand') }}">
                            <i class="fas fa-tachometer-alt"></i>Brand</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <h2>Cool SEM</h2>
                    {{-- <img src={{ url('/Admin_assets/images/icon/logo.png') }} alt="Cool Admin" /> --}}
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="@yield('dashboard-selected')">
                            <a href="{{ url('admin/dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="@yield('category-selected')">
                            <a href="{{ url('admin/category') }}">
                                <i class="fas fa-list"></i>Catogery</a>
                        </li>
                        <li class="@yield('coupon-selected')">
                            <a href="{{ url('admin/coupon') }}">
                                <i class="fas fa-tag"></i>Coupon</a>
                        </li>
                        <li class="@yield('size-selected')">
                            <a href="{{ url('admin/size') }}">
                                <i class="fas fa-window-maximize"></i>Size</a>
                        </li>
                        </li>
                        <li class="@yield('color-selected')">
                            <a href="{{ url('admin/color') }}">
                                <i class="fas fa-paint-brush"></i>Color</a>
                        </li>
                        <li class="@yield('product-selected')">
                            <a href="{{ url('admin/product') }}">
                                <i class="fas fa-tachometer-alt"></i>Product</a>
                        </li>
                        <li class="@yield('brand-selected')">
                            <a href="{{ url('admin/brand') }}">
                            <i class="fas fa-tachometer-alt"></i>Brand</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">

                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">

                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">

                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Welcome admin</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">

                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>

                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{ url('admin/logout') }}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content m-l-40 m-r-40">
                @section('container')
                @show
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>


    <script src={{ url('/Admin_assets/vendor/jquery-3.2.1.min.js') }}></script>
    <script src={{ url('/Admin_assets/vendor/bootstrap-4.1/popper.min.js') }}></script>
    <script src={{ url('/Admin_assets/vendor/bootstrap-4.1/bootstrap.min.js') }}></script>
    <script src={{ url('/Admin_assets/vendor/wow/wow.min.js') }}></script>
    <script src={{ url('/Admin_assets/js/main.js') }}></script>
    <script
  {{-- src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script> --}}
</body>

</html>
<!-- end document-->
