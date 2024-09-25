<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('frontend.layouts.menu')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
