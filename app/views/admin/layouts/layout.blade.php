<!doctype html>
<html lang="nl">
<head>
    @include('admin.includes.head')
</head>
<body class="@yield('title')">
    <div class="left-panel">
        @include('admin.includes.navigation')
    </div>
    <main class="main-panel">
        <div class="container-fluid">
            <h1>@yield('title')</h1>
            @yield('content')
            @include('admin.includes.footer')
        </div>
    </main>
    <div class="right-panel"></div>
</body>
</html>