<!doctype html>
<html lang="nl">
<head>
    @include('admin.includes.head')
</head>
<body>
    <div class="container-fluid">
        @include('admin.includes.navigation')
        <main class="container">
            <h1>@yield('title')</h1>
            @yield('content')
        </main>
        @include('admin.includes.footer')
    </div>
</body>
</html>