<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Login</title>
    <!-- Fontfaces CSS-->
    <link href={{ url('/Admin_assets/css/font-face.css') }} rel="stylesheet" media="all" />
    <link href={{ url('/Admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css') }} rel="stylesheet"
        media="all" />
    <link href={{ url('/Admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css') }} rel="stylesheet"
        media="all" />
    <link href={{ url('/Admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css') }} rel="stylesheet"
        media="all" />
    <!-- Bootstrap CSS-->
    <link href={{ url('/Admin_assets/vendor/bootstrap-4.1/bootstrap.min.css') }} rel="stylesheet" media="all" />
    <!-- Main CSS-->
    <link href={{ url('/Admin_assets/css/theme.css') }} rel="stylesheet" media="all" />
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            {{ Config::get('constants.site_name') }}
                        </div>
                        <div class="login-form">
                            <form action="{{ route('admin.auth') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email"
                                        placeholder="Email" />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password"
                                        placeholder="Password" />
                                </div>

                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">
                                    sign in
                                </button>
                                @if (session()->has('error'))
                                    <div role="alert" class="alert alert-denger">{{ session('error') }}</div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src={{ url('/Admin_assets/vendor/jquery-3.2.1.min.js') }}></script>
    <script src={{ url('/Admin_assets/vendor/bootstrap-4.1/popper.min.js') }}></script>
    <script src={{ url('/Admin_assets/vendor/bootstrap-4.1/bootstrap.min.js') }}></script>
    <script src={{ url('/Admin_assets/vendor/wow/wow.min.js') }}></script>
    <script src={{ url('/Admin_assets/js/main.js') }}></script>
</body>

</html>
<!-- end document-->
