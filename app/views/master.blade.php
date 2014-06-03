<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pizarron | @yield('title', 'Home')</title>
  <link rel="stylesheet" href="{{ asset('assets/css/vendors.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
  @yield('styles', '')
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
    @if($errors->has())
      <div class="alert alert-danger">
        @foreach($errors->all() as $error)
          {{ $error }}<br>
        @endforeach
      </div>
    @endif
    @yield('content')
  </div>
<script src="{{ asset('assets/js/vendor.js') }}"></script>
@yield('other_vendors', '')
@yield('scripts', '')
</body>
</html>
