<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pizarron | @yield('title', 'Home')</title>
  <link rel="stylesheet" href="{{ asset('assets/css/vendors.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>
<body>
  @include('partials.navbar')
  <div class="wrapper">
    @if(Session::has('message'))
      <div class="alert alert-success">
        {{ Session::get('message') }}
      </div>
    @endif
    @if(Session::has('error'))
      <div class="alert alert-danger">
        {{ Session::get('error' )}}
      </div>
    @endif
    @yield('content')
  </div>
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
