<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="{{asset('img/bbpp-logo.png')}}" type="image/gif">
  <title>Sistem Kediklatan - BBPP Binuang Kalimantan Selatan</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
          <span>SISTEM</span> KEDIKLATAN
        </a>
      </div>
    </nav>
    <div id="app">
      <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
          <div class="profile-userpic">
            <img src="{{asset('img/user/'.Auth::User()->foto)}}" class="img-responsive" alt="">
          </div>
          <div class="profile-usertitle">
            <div class="profile-usertitle-name">{{Auth::User()->username}}</div>
            <div class="profile-usertitle-status">
              {{Auth::User()->nama}}
            </div>
          </div>
          <div class="clear"></div>
        </div>
        <div class="divider"></div>
        <ul class="nav menu">
          <li {{HRoute::ActiveRoute('Dashboard')}}>
            <a href="{{ Route('Dashboard') }}">
              <em class="fa fa-dashboard">&nbsp;</em> Dashboard
            </a>
          </li>
          <li {{HRoute::ActiveRoute('Data-Satuan-Kerja')}}>
            <a href="{{ Route('Data-Satuan-Kerja') }}">
              <em class="fa fa-calendar">&nbsp;</em> Satuan Kerja
            </a>
          </li>
          <li {{HRoute::ActiveRoute('Data-Unit-Kerja')}}>
            <a href="{{ Route('Data-Unit-Kerja') }}">
              <em class="fa fa-calendar">&nbsp;</em> Unit Kerja
            </a>
          </li>
          <li {{HRoute::ActiveRoute('Data-Penyuluh')}}>
            <a href="{{ Route('Data-Penyuluh') }}">
              <em class="fa fa-calendar">&nbsp;</em> Penyuluh
            </a>
          </li>
          <button-logout></button-logout>
        </ul>
      </div>
      <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
          <ol class="breadcrumb">
            <li><a href="#">
              <em class="fa fa-home"></em>
            </a></li>
            <li class="active">{{HRoute::JudulRoute()}}</li>
          </ol>
        </div>

        <div class="row row-header">
          <div class="col-lg-12">
            <h3 class="page-header">{{HRoute::JudulRoute()}}</h3>
          </div>
        </div>
        @yield('content')
      </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @if (session('success'))
      <script type="text/javascript">
      notif('success', 'Berhasil', '{{session('success')}}');
      </script>
    @endif
  </body>
  </html>
