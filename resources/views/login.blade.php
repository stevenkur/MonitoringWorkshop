<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <style>
    .button {
        background-color: #2697D1;
        border: none;
        color: white;
        padding: 8px 16px;
        text-align: center;
        width: 150px;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
    }
    </style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MonitoringWorkshop') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.MonitoringWorkshop = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/admin') }}">
                        {{ config('app.name', 'MonitoringWorkshop') }}
                    </a>
                </div>

                </div>
            </div>
        </nav>

<center>
<h3>WELCOME TO INFORMATION SYSTEM FOR MONITORING ACTIVITIES IN PRODUCTION WORKSHOP OF NEW SHIP BUILDING</h3>
<img src="{{ URL::asset('img/ship.png') }}" alt="ship" width="300" height="100">
</center>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><center>Name Of Company</center></div>
                <div class="panel-body">

                    <center>
                    <h4>Choose Log In As</h4>
                    <button class="button"><h4>Administrator</h4></button>
                    <button class="button"><h4>User</h4></button>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
