<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
            "http://www.w3.org/TR/html4/strict.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <title>@yield('title') </title>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/p4.css')}}" >
</head>
<body>
    <div class="center">
         <div class="list">
        <div class="logo"><img src="{{asset('images/logo.png') }}" alt="logo image" height="120" width="375"></div>
        <div class="header"><?php include(app_path().'/views/includes/header.php'); ?></div>
         </div>
        <h3>@yield('landingPageIntro')</h3>
        <h4>@yield('bodyContent')</h4>
    </div>

</body>
</html>
