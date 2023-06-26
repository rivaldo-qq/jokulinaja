<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    {{--style--}}
    @stack('sebelum-style')
    @include('includes.style')
    @stack('setelah-style')
  </head>
  <!--navbar gambar logo S, tombol yang ada di atas-->
  <body>
    <!-- Page Content -->
    @yield('content')

    {{--footer--}}
    @include('includes.footer')
    <!-- Bootstrap core JavaScript -->
    @stack('sebelum-script')
    @include('includes.script')
    @stack('setelah-script')

  </body>
</html>
