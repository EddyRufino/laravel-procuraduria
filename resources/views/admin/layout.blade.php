<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>{{ config('app.name') }}</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/css/adminlte.min.css">
  <link rel="stylesheet" href="/myCss.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" /> --}}
  <link rel="stylesheet" href="/adminlte/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/select2/dist/css/select2.min.css">

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
  {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"> --}}

  @stack('styles')

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}

    <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
      {{-- <li class=" dropdown user user-menu menu-toggle"> --}}
        <!-- Menu Toggle Button -->
        {{--<a h ref="#" style="color: #6c757d" class="dropdown-toggle" data-t oggle="dropdown">--}}
          <!-- The user image in the navbar-->
          {{-- <img src="/adminlte/img/user2-160x160.jpg" class="us er-image" alt="User Image">--}}
          <!-- hidden-xs hides the username on small devices so only the image appears. -->
          {{-- <span class="hidden-xs">{{ auth()->user()->name }}</span>
        </a> --}}
      {{-- <ul class="dropdown-menu"> --}}
        <!-- The user image in the menu -->
        {{-- <li class="user-header">
          <p>
            {{ auth()->user()->name }}
            {{ auth()->user()->roles->count() ?' - '.auth()->user()->roles->first()->display_name : '' }}
            <small>Desde: {{ auth()->user()->created_at->format('d/M/Y') }}</small>
          </p>
        </li> --}}
        <!-- Menu Footer-->
        {{-- <li class="user-footer"> --}}
          {{-- <div class="pull-left">
            <a href="#" class="btn btn-default btn-flat">Profile</a>
          </div> --}}
          {{-- <p class="text-center"> --}}
            {{-- {{ auth()->user()->name }} --}}
            {{-- {{ auth()->user()->roles->count() ?' - '.auth()->user()->roles->first()->display_name : '' }}
            <small>Desde: {{ auth()->user()->created_at->format('d/M/Y') }}</small> --}}
          {{-- </p> --}}
{{--           <form method="POST" action="{{ route('logout') }}">
            {{ csrf_field() }}
            <button href="#" class="btn btn-default btn btn-block">Cerrar Sesión</button>
          </form> --}}
{{--         </li>
      </ul>
    </li>--}}
    </ul> 


          <div @click.away="open = false" class="position-relative" x-data="{ open: false }">
            <a href="#" @click="open = !open" class="text-secondary">
              <span class="">{{ Auth::user()->name }}</span>
              <svg style="width: 20px;" fill="currentColor" viewBox="0 0 20 20" :class="{'rotateX-180': open, 'rotateX-0': !open}" class=""><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
            <div x-show="open" class="position-absolute w-100 mt-2  rounded z-30">
              <div class="px-2 py-2 bg-white rounded shadow">
                
                <a onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"
                  href="#" class="flex flex-items-center px-3 py-3">
                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="text-gray-600"><path d="M0 0h24v24H0z" fill="none"></path><path d="M10.09 15.59L11.5 17l5-5-5-5-1.41 1.41L12.67 11H3v2h9.67l-2.58 2.59zM19 3H5c-1.11 0-2 .9-2 2v4h2V5h14v14H5v-4H3v4c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"></path></svg><span class="ml-2">Salir</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                  {{ csrf_field() }}
                </form>
              </div>
            </div>
          </div>



  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/adminlte/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
        @include('partials.nav')
      <!-- /.sidebar-menu -->
      
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Main content -->
    @include('partials.session-status')
    <div class="m-2" id="app">
      @yield('content')
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="/adminlte/js/adminlte.min.js"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> --}}
<script src="/adminlte/plugins/select2/dist/js/select2.full.min.js"></script>

<script src="/adminlte/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


@stack('scripts')


</body>
</html>

<script>
  $('#datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
  $('#datepicker2').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });

  $('.select2').select2({
    tags: true
  });

   $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
        });
</script>