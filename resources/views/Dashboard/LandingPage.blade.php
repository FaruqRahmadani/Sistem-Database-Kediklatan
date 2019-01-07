<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BBPP Binuang</title>
  <link href="{{asset('css/landingpage/main.css')}}" rel="stylesheet">
</head>

<body id="top">
  <header>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">
            <img src="{{asset('img/logofix.png')}}" alt="Logo">
          </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a class="scrollLink" href="#top">BERANDA</a></li>
            <li><a class="scrollLink" href="#info">INFORMASI</a></li>
            <li><a class="scrollLink" href="#contact">KONTAK</a></li>
            <li><a href="{{route('login')}}">LOGIN</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div id="hero">
    <div class="container">
      <div class="row mb">
          <div class="col-md-12">
            <img class="img-fluid img-responsive" src="{{asset($Pengaturan->image_landing??null)}}" alt="image">
          </div>
      </div>
    </div>
  </div>
  <div id="about">
    <div class="container">
      <div class="row text-center">
        <h1 class="title">SELAMAT DATANG</h1>
        <p>Sistem Database Kediklatan digunakan untuk mempermudah dalam pengelolaan data penyuluh, kelompok tani, data komoditas, dan data pelatihan.</p>
        <p>Untuk memulai aplikasi ini, silahkah pilih <strong>Login</strong> pada menu navigasi. Pastikan anda mempunyai username dan passwork untuk masuk ke Aplikasi</p>
      </div>
    </div>
  </div>
  <div id="info">
    <div class="container">
      <h1 class="title text-center">INFORMASI</h1>
      <div class="row">
        <div class="col-sm-3">
          <div class="hero-widget">
            <div class="icon">
              <i class="glyphicon glyphicon-user"></i>
            </div>
            <div class="text">
              <var>{{$Penyuluh->count()}}</var>
            </div>
            <div class="info-title">DATA PENYULUH</div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="hero-widget">
            <div class="icon">
              <i class="glyphicon glyphicon-grain"></i>
            </div>
            <div class="text">
              <var>{{$KelompokTani->count()}}</var>
            </div>
            <div class="info-title">DATA KELOMPOK TANI</div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="hero-widget">
            <div class="icon">
              <i class="glyphicon glyphicon-leaf"></i>
            </div>
            <div class="text">
              <var>{{$Komoditas->count()}}</var>
            </div>
            <div class="info-title">DATA KOMODITAS</div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="hero-widget">
            <div class="icon">
              <i class="glyphicon glyphicon-certificate"></i>
            </div>
            <div class="text">
              <var>{{$Pelatihan->count()}}</var>
            </div>
            <div class="info-title">PELATIHAN</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="contact">
    <div class="container">
      <div class="row text-center">
          <h1 class="title">KONTAK</h1>
          <p> {!!nl2br($Pengaturan->kontak??null)!!} </p>
        </div>
    </div>
  </div>
  <footer>
    <div class="container">
      <div class="text-center">Balai Besar Pelatihan Pertanian - 2018</div>
    </div>
  </footer>
	<script src="{{asset('js/landingpage/jquery.js')}}"></script>
	<script src="{{asset('js/landingpage/main.js')}}"></script>
	<script src="{{asset('js/landingpage/bootstrap.min.js')}}"></script>
</body>

</html>
