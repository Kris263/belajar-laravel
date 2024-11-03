<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LARAVEL</title>
</head>
<body>
    <div>
        <header>
            <nav><a href="/">HOME</a></nav>
            <nav><a href="/login">LOGIN</a></nav>
        </header>
        <div>
            {{-- OUR Content --}}

            @yield('content')

            {{-- END Our Content --}}
        </div>
        <footer>&copy; Kristian Baru Belajar Laravel</footer>
    </div>
</body>
</html>