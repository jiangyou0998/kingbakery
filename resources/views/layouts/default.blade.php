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

@include('layouts._header')
<!-- Main -->
    <div class="wrapper content">
        @yield('content')
        <div class="push"></div>
    </div>

    @include('layouts._footer')

</div>

@yield('script')
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
