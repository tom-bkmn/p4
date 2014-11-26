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
        <h2>@yield('intro')</h2>
        <br>
        <h3>@yield('form')</h3>
    </div>

</body>
</html>
