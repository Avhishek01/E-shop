<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

      <!--     Fonts and icons     -->
      <link href="{{asset('https://fonts.googleapis.com/css?family=Montserrat:400,700,200')}}" rel="stylesheet" />
      <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css')}}" />
   
    <!-- Styles -->
    {{-- <link href="../assets/css/bootstrap.min.css" rel="stylesheet" /> --}}
    <link href="../admin/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" /> 
   
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/light-bootstrap-dashboard.css') }}" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        @include('layouts.inc.sidebar')
        <div class="main-panel">

            @include('layouts.inc.admin_nav')

        <div class="content">

            @yield('content')

        </div>

            @include('layouts.inc.admin_footer')
            
        </div>
    </div>





    <!--   Core JS Files   -->
    {{-- <script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script> --}}

     <!-- Scripts -->
     <script src="{{ asset('admin/js/jquery.3.2.1.min.js') }}" defer></script>
     <script src="{{ asset('admin/js/popper.min.js') }}" defer></script>
     <script src="{{ asset('admin/js/bootstrap.min.js') }}" defer></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     @if(session('status'))
        <script>
            swal("{{session('status')}}");
        </script>
     @endif
    @yield('scripts')
</body>
</html>
