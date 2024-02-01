<!DOCTYPE html>
<html lang="en" ng-app="myApp">

<head>
    <meta charset="utf-8">
    <title>{{ isset($body['title']) ? $body['title']. ' ::'. env('APP_NAME') . '::': '' }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="author" content="{{ URL::to('/') }}">
    <meta name="description" content="">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/@site_control/vali-theme/css/main.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/node_modules/animate.css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/jquery-ui/ui-themeredmond/jquery-ui-1.10.4.custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/node_modules/sweetalert2/dist/sweetalert2.min.css') }}">
    @if(isset($stylesheets))
        @foreach ($stylesheets as $stylesheet)
    <link rel="stylesheet" href="{{ $stylesheet }}">
        @endforeach
    @endif
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/@base_site/css/bundle.min.css') }}">
    @yield('stylesheet-content')
</head>

<body class="app sidebar-mini sidenav-toggled">

    @include('home::layouts.header')

    <main class="app-content">
        @if(isset($breadcrumb) && !empty($breadcrumb))
        <div class="app-title">
            {!! breadcrumb($breadcrumb) !!}
        </div>
        @endif

        @yield('app-content')
    </main>

    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('assets/node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/@site_control/vali-theme/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/@site_control/vali-theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/@site_control/vali-theme/js/main.min.js') }}"></script>
    <script src="{{ asset('assets/node_modules/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('assets/@site_control/vali-theme/js/plugins/pace.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/remarkable-bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <!-- jquery ui -->
    <script src="{{ asset('assets/jquery-ui/jquery-ui-1.10.4.custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/node_modules/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/node_modules/jquery-validation/dist/additional-methods.js') }}"></script>
    <script src="{{ asset('assets/node_modules/angular/angular.min.js') }}"></script>
    <script src="{{ asset('assets/@base_site/js/app/app.js') }}"></script>
    <script src="{{ asset('assets/node_modules/jpkleemans-angular-validate/dist/angular-validate.min.js') }}"></script>
    @if(isset($scripts))
        @foreach ($scripts as $script)
            @if(is_array($script))
            <script {{ $script['defer'] }} src="{{ $script['link'] }}" type="text/javascript"></script>
            @else
            <script src="{{ $script }}" type="text/javascript"></script>
            @endif
        @endforeach
    @endif
    @yield('script-content')
    <script src="{{ asset('assets/@base_site/js/script.min.js') }}"></script>
</body>

</html>
