<!DOCTYPE html>
<html lang="en" ng-app="myApp">

<head>
    <meta charset="utf-8">
    <title>{{ isset($body['title']) ? $body['title']. ' ::'. env('APP_NAME') . '::': 'Admin Panel' }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="author" content="{{ URL::to('/') }}">
    <meta name="description" content="">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/@site_control/vali-theme/css/main.min.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/@site_control/css/bundle.min.css') }}">
</head>

<body class="app sidebar-mini">

    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content" title="Rajabhat Dataset">
        <div class="logo text-center">
            <h1 class="text-light">Rajabhat Dataset</h1>
            <p class="mt-2 mb-0 text-uppercase text-sm"><span class="bg-dark text-white-50 px-2 py-1">by Rajabhat Yala University</span></p>
        </div>
        <div class="login-box">
            <form class="login-form" method="POST" action="{{ route('admin.login') }}">
                @csrf
                <h3 class="login-head"><i class="fa fa-user-circle fa-fw fa-lg" aria-hidden="true"></i> เข้าสู่ระบบ</h3>
                <div class="form-group">
                    <label class="control-label">ชื่อผู้ใช้งาน</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username" placeholder="ระบุชื่อผู้ใช้งาน" required autofocus>
                    <x-error-message title="username"/>
                </div>
                <div class="form-group">
                    <label class="control-label">รหัสผ่าน</label>
                    <input type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="ระบุรหัสผ่าน" name="password" required>
                    <x-error-message title="password"/>
                </div>
                <div class="form-group">
                    <div class="utility">
                        <div class="animated-checkbox">
                            <label>
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><span class="label-text">จำฉันในระบบ</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>เข้าสู่ระบบ</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('assets/node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/@site_control/vali-theme/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/@site_control/vali-theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/@site_control/vali-theme/js/main.min.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('assets/@site_control/vali-theme/js/plugins/pace.min.js') }}"></script>
</body>

</html>