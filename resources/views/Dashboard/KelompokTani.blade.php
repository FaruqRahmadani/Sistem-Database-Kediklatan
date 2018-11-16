@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<blockquote><h2 style="margin:0;">Selamat datang di Sistem Database Kediklatan</h2>BBPP Binuang - Kalimantan Selatan</blockquote>

					<p>Sistem Database Kediklatan dapat membantu dalam pengelolaan data kediklatan seperti data pelatihan, data penyuluh, data komoditas, dan data peserta pelatihan.</p>

				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-container">
		<div class="panel-body">
			<dl class="col-lg-9 col-sm-12">
				<legend>Data Kelompok Tani</legend>
				<dl>
					<dt class="col-sm-3 col-lg-4">Nama</dt>
					<dd class="col-sm-9 col-lg-8">{{$KelompokTani->nama}}</dd>
				</dl>
				<dl>
					<dt class="col-sm-3 col-lg-4">Ketua Kelompok</dt>
					<dd class="col-sm-9 col-lg-8">{{$KelompokTani->nama_ketua}}</dd>
				</dl>
				<dl>
					<dt class="col-sm-3 col-lg-4">Penyuluh</dt>
					<dd class="col-sm-9 col-lg-8">
						({{$KelompokTani->Penyuluh->nip}}) {{$KelompokTani->Penyuluh->nama}}
					</dd>
				</dl>
				<dl>
					<dt class="col-sm-3 col-lg-4">No Handphone</dt>
					<dd class="col-sm-9 col-lg-8">{{$KelompokTani->nomor_hp}}</dd>
				</dl>
				<dl>
					<dt class="col-sm-3 col-lg-4">Alamat</dt>
					<dd class="col-sm-9 col-lg-8">{{$KelompokTani->alamat}}</dd>
				</dl>
				<dl>
					<dt class="col-sm-3 col-lg-4">Kota/Kabupaten</dt>
					<dd class="col-sm-9 col-lg-8">{{$KelompokTani->Kota->nama}}</dd>
				</dl>
			</dl>
			<dl class="col-lg-3 visible-lg visible-xl">
				<legend class="text-center">Foto Ketua</legend>
				<img src="{{asset($KelompokTani->foto)}}" class="w-100">
			</dl>
			<dl class="col-sm-12">
				<legend>Komoditas</legend>
				@foreach ($KelompokTani->Komoditas as $Komoditas)
					<dl>
						<dd class="col-sm-12"><b>{{$loop->iteration}}.</b> {{$Komoditas->nama}}</dd>
					</dl>
				@endforeach
			</dl>
			<dl class="col-sm-12">
				<legend>Pelatihan</legend>
				@foreach ($KelompokTani->Pelatihan as $Pelatihan)
					<dl>
						<dd class="col-sm-12"><b>{{$loop->iteration}}.</b> {{$Pelatihan->nama}}</dd>
					</dl>
				@endforeach
			</dl>
		</div>
	</div>
</div>
@endsection
