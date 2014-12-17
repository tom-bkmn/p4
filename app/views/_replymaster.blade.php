<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <title>@yield('title') </title>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/p4.css')}}">
</head>
<body>
    <div class="center">
        <div class="listHeader">
            <div class="logo"><img class="imageFormat" src="{{asset('images/logo2.png') }}" alt="logo image" height="120" width="375"></div>
            <div class="header"><?php include(app_path().'/views/includes/header2.php'); ?></div>
        </div>
        <h3>@yield('intro')</h3>
        @yield('entries')
        @yield('form')
    </div>

</body>
</html>
