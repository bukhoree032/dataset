
<!DOCTYPE html>
<html lang="en" ng-app="myApp">

<head>
    <meta charset="utf-8">
    <title>{{ isset($body['title']) ? $body['title']. ' ::'. env('APP_NAME') . '::': 'Control Panel :: Dataset - Yala Rajabhat University' }}</title>
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

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/jquery-ui/ui-themeredmond/jquery-ui-1.10.4.custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap-fileinput/css/fileinput.min.css') }}">
    <!-- -- chart -- -->
    <link rel="stylesheet" type="text/css" href="{{ asset('https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/9-5-7/css/9-5-7.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/chart/chart.css') }}">
    
    <!-- ----- /chart ----- -->
    @if(isset($stylesheets))
        @foreach ($stylesheets as $stylesheet)
    <link rel="stylesheet" href="{{ $stylesheet }}">
        @endforeach
    @endif
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/@site_control/css/bundle.min.css') }}">
    @yield('stylesheet-content')
</head>

<body class="app sidebar-mini">

    @include('admin::layouts.header')

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1>{!! $body['app_title']['h1'] !!}</h1>
                <p>{!! $body['app_title']['p'] !!}</p>
            </div>

            @if(isset($breadcrumb)) {!! breadcrumb($breadcrumb) !!} @endif
        </div>
        @yield('app-content')
    </main>

    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('assets/node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/@site_control/vali-theme/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/@site_control/vali-theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/@site_control/vali-theme/js/main.min.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('assets/@site_control/vali-theme/js/plugins/pace.min.js') }}"></script>
    <!-- jquery ui -->
    <script src="{{ asset('assets/jquery-ui/jquery-ui-1.10.4.custom.min.js') }}"></script>
    <script src="{{ asset('assets/node_modules/angular/angular.min.js') }}"></script>
    <script src="{{ asset('assets/@site_control/js/app/app.js') }}"></script>
    <script src="{{ asset('assets/@site_control/js/jquery.print.js') }}"></script>

    <!-- krejee bootstrap-fileinput -->
    <script src="{{ asset('assets/bootstrap-fileinput/js/plugins/purify.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/bootstrap-fileinput/js/plugins/sortable.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/bootstrap-fileinput/js/plugins/piexif.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap-fileinput/js/locales/th.js') }}"></script>
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
    <script src="{{ asset('assets/@site_control/js/script.min.js') }}"></script>
    <!-- ------ chart --------- -->
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/protonet-jquery.inview/1.1.2/jquery.inview.min.js') }}"></script>
    <script src="{{ asset('assets/chart/chart.js') }}"></script>
    
</body>

</html>
