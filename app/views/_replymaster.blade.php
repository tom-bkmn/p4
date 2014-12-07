<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
            "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <title>@yield('title') </title>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/p4.css')}}">
</head>
<body>
    <div class="center">
        <?php include(app_path().'/views/includes/header.php'); ?>
        <h3>@yield('intro')</h3>
        <br>
        <h4>@yield('entries')</h4>
        <h4>@yield('form')</h4>
    </div>

</body>
</html>
