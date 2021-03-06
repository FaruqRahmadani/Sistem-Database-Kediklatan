@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Data Peserta Pelatihan <small>Kelompok Tani</small></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{Route('pesertaPelatihanTambahForm', ['idPelatihan' => $Pelatihan->UUID])}}" class="btn btn-primary btn-sm">
						<span class="fa fa-plus img-circle text-default"></span>
						Tambah Data
					</a>
				</div>
				<div class="panel-body">
					<table id="myTable" class="table table-hover table-custom">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama</th>
								<th>Nama Ketua</th>
								<th>Penyuluh</th>
								<th>Nomor HP</th>
								<th>Alamat</th>
								<th>Kota</th>
								<th>Komoditas</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($Pelatihan->KelompokTani as $Index=>$DataKelompokTani)
								<tr>
									<td>{{$Index+1}}</td>
									<td>{{$DataKelompokTani->nama}}</td>
									<td>{{$DataKelompokTani->nama_ketua}}</td>
									<td>{{$DataKelompokTani->Penyuluh->nama}}</td>
									<td>{{$DataKelompokTani->nomor_hp}}</td>
									<td>{{$DataKelompokTani->alamat}}</td>
									<td>{{$DataKelompokTani->Kota->nama}}</td>
									<td>
										@foreach ($DataKelompokTani->Komoditas as $Komoditas)
											<span class="btn-primary btn-xs span-list">
										    {{$Komoditas->nama}}
										  </span>
										@endforeach
									</td>
									<td>
										<button data={{$DataKelompokTani->UUID}} href={{Route('pesertaPelatihanHapus', ['idPelatihan' => $Pelatihan->UUID])}} class="btn btn-warning btn-xs btn-delete">Delete</button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
