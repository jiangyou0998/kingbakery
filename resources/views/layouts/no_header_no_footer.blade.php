<!DOCTYPE HTML>

<html>
<head>
    <meta name="ROBOTS" content="NOINDEX,NOFOLLOW">
    <title>@yield('title', 'King Bakery') - 蛋撻王</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('css')
</head>
<body>
<div id="page-wrapper">

<!-- Main -->
    <div class="wrapper content">
        @yield('content')
    </div>

</div>

@yield('script')
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
