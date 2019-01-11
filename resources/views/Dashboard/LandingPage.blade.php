@extends('Layouts.Master')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			{{-- <div class="panel-heading">Informasi Aplikasi</div> --}}
			<div class="panel-body">
				<blockquote><h2 style="margin:0;">Selamat datang di Sistem Database Kediklatan</h2>BBPP Binuang - Kalimantan Selatan</blockquote>

				<p>Sistem Database Kediklatan dapat membantu dalam pengelolaan data kediklatan seperti data pelatihan, data penyuluh, data komoditas, dan data peserta pelatihan.</p>

			</div>
		</div>
	</div>
</div>
<div class="panel panel-container">
	<div class="row">
	<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
		<div class="panel panel-teal panel-widget border-right">
			<div class="row no-padding">
				<em class="fa fa-xl fa-user color-blue"></em>
				<div class="large">{{$Penyuluh->count()}}</div>
				<div class="text-muted">Penyuluh</div>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
		<div class="panel panel-blue panel-widget border-right">
			<div class="row no-padding">
				<em class="fa fa-xl fa-users color-orange"></em>
				<div class="large">{{$KelompokTani->count()}}</div>
				<div class="text-muted">Kelompok Tani</div>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
		<div class="panel panel-orange panel-widget border-right">
			<div class="row no-padding">
				<em class="fa fa-xl fa-archive color-teal"></em>
				<div class="large">{{$Komoditas->count()}}</div>
				<div class="text-muted">Komoditas</div>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
		<div class="panel panel-red panel-widget ">
			<div class="row no-padding">
				<em class="fa fa-xl fa-book color-red"></em>
				<div class="large">{{$Pelatihan->count()}}</div>
				<div class="text-muted">Pelatihan</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection
