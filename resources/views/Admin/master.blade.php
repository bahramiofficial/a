<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>هلدینگ سرافراز</title>

    <link rel="stylesheet" href="/css/admin.css">


    <link href="https://vjs.zencdn.net/5.8/video-js.min.css" rel="stylesheet">
    <script src="https://vjs.zencdn.net/5.8/video.min.js"></script>

    @yield('style')
</head>

<body>

{{--sdfsdfsdfsd@gmail.com--}}
بسبیبسیب
<video controls preload="auto" src="{{ route('stream') }}" width="100%"></video>

dddddddddddddddd

<video id="movie" width="460" height="306" preload autoplay>
    <source src="http://127.0.0.1:8000/api/v1/stream"  type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
    <!-- HERE THE CODE FOR THE ALTERNATIVE PLAYER (FLASH) WILL BE! -->
</video>

<br>
fsdfsdfsdf
<video id="player" class="video-js vjs-default-skin" height="360" width="640" controls preload="none">
    <source src="http://techslides.com/demos/sample-videos/small.mp4" type="application/x-mpegURL" />




</video>

<script>
    var player = videojs('#player');
</script>




{{--    <div id="app">--}}
{{--        @include('Admin.section.header')--}}

{{--        @yield('content')--}}

{{--    </div>--}}

{{--    @include('Admin.section.footer')--}}

</body>
</html>
