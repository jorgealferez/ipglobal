<html>
<head>
    <title>{{config('app.name')}}</title>
    @include('layout.components.styles')
</head>
<body>
    @include('layout.components.navbar')

    <div class="container mt-5">
        @yield('content')
    </div>
    @include('layout.components.scripts')
</body>
</html>
