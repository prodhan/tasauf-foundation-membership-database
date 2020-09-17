<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('custom-css')

    <title>
        @if(View::hasSection('title'))
            @yield('title') - {{$settings['app_name']}}
            {{--{{config('app.name')}}--}}
        @else
            Tasauf Foundation
        @endif
    </title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('admin/css/lib/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
<div class="container">
@yield('main-content')

<footer align="center">Powered By <a href=https://www.pigeon-soft.com/"">Pigeon Soft</a></footer>
</div>

@yield('custom-js')

</body>
</html>