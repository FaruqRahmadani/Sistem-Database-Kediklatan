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
          <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
            <em class="fa fa-navicon">&nbsp;</em> Master <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
          </a>
          <ul class="children collapse" id="sub-item-1">
            <li>
              <a href="{{Route('userData')}}">
                <em class="fa fa-user">&nbsp;</em> Data User
              </a>
            </li>
            <li>
              <a href="{{Route('satuanKerjaData')}}">
                <em class="fa fa-building">&nbsp;</em> Satuan Kerja
              </a>
            </li>
            <li>
              <a href="{{Route('unitKerjaData')}}">
                <em class="fa fa-building-o">&nbsp;</em> Unit Kerja
              </a>
            </li>
            <li>
              <a href="{{Route('komoditasData')}}">
                <em class="fa fa-archive">&nbsp;</em> Komoditas
              </a>
            </li>
            <li>
              <a href="{{Route('kotaKomoditasData')}}">
                <em class="fa fa-map-o">&nbsp;</em> Kota Komoditas
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="{{Route('penyuluhData')}}">
            <em class="fa fa-user">&nbsp;</em> Penyuluh
          </a>
        </li>
        <li>
          <a href="{{Route('kelompokTaniData')}}">
            <em class="fa fa-users">&nbsp;</em> Kelompok Tani
          </a>
        </li>
        <li {{HRoute::ActiveRoute('Data-P4S')}}>
          <a href="{{ Route('Data-P4S') }}">
            <em class="fa fa-th-large">&nbsp;</em> P4S
          </a>
        </li>
        <button-logout></button-logout>
      </ul>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
      @yield('content')
    </div>
  </div>
  <script src="{{ asset('js/app.js') }}"></script>
  @if (session('alert'))
    <script type="text/javascript">notif('{{session('tipe')}}', '{{session('judul')}}', '{{session('pesan')}}')</script>
  @endif
  @if ($errors->count())
    <script>notif('error', 'Ada Kesalahan', '{{$errors->first()}}')</script>
  @endif
</body>
</html>
