<!doctype html>
<html lang="nl">
<head>
    @include('admin.includes.head')
</head>
<body class="@yield('title')">
    <div class="panel-left">
        @include('admin.includes.navigation')
    </div>
    <main class="panel-main">
        <div class="container-fluid">
            <h1>@yield('title')</h1>
            @yield('content')
            @include('admin.includes.footer')
        </div>
    </main>
</body>
</html>