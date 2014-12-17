<!DOCTYPE HTML>
<html  xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <title>@yield('title') </title>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/p4.css')}}" >
</head>
<body>
    <div class="center">
         <div class="listHeader">
            <div class="logo"><img class="imageFormat" src="{{asset('images/logo2.png') }}" alt="logo image" height="120" width="375"></div>
            <div class="header"><?php include(app_path().'/views/includes/header.php'); ?></div>
         </div>
        <h3>@yield('landingPageIntro')</h3>
        @yield('bodyContent')
    </div>

</body>
</html>
