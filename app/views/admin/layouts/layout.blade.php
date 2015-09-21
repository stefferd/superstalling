<!doctype html>
<html lang="nl">
<head>
    @include('admin.includes.head')
</head>
<body class="@yield('title')">
    <div class="container-fluid">
        <div class="left-panel">
            @include('admin.includes.navigation')
        </div>
        <main class="main-panel container">
            <h1>@yield('title')</h1>
            @yield('content')
            @include('admin.includes.footer')
        </main>
        <div class="right-panel"></div>
    </div>
</body>
</html>