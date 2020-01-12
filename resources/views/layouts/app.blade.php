<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Employee</title>
        <script src="https://kit.fontawesome.com/0ba3fad32c.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
    </head>
    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal">Employees</h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="/">Empleados</a>
                <a class="p-2 text-dark" href="/create">Nuevo empleado</a>
            </nav>
            <a class="btn btn-outline-primary" href="#">Sign in</a>
        </div>

        <div class="container">
            @yield('content')
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2017-2019 Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>

        <script async src="{{mix('js/app.js')}}"></script>
    </body>
</html>
