<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tiMovie - @yield('title', 'Website')</title>
    <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    {{-- Panggil Navbar --}}
    @include('partials.navbar')

    <div class="container my-2">
        {{-- Panggil Alert Global --}}
        @include('partials.alert')

        @yield('content')
    </div>

    {{-- Panggil Footer --}}
    @include('partials.footer')

    <script src="/bootstrap/bootstrap.bundle.min.js"></script>
  </body>
</html>
