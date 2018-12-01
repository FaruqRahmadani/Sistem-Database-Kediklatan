@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Data Kelompok Tani</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				@if (Auth::User())
					<div class="panel-heading">
						<a href="{{Route('kelompokTaniTambahForm')}}" class="btn btn-primary btn-sm">
							<span class="fa fa-plus img-circle text-default"></span>
							Tambah Data
						</a>
						<a href="{{Route('cetakKelompokTani')}}" class="btn btn-info btn-sm" target="_blank">
							<span class="fa fa-print img-circle text-default"></span>
							Cetak
						</a>
						<a href="{{Route('kelompokTaniExport')}}" class="btn btn-default btn-sm text-right">
							<span class="fa fa-print img-circle text-default"></span>
							Export Excel
						</a>
					</div>
				@endif
				<div class="panel-body">
					<table id="myTable" class="table table-hover table-custom">
						<thead>
							<tr>
								<th>#</th>
								<th>NIK/NIP</th>
								<th>Nama</th>
								<th>Ketua Kelompok</th>
								<th>Penyuluh</th>
								<th>Nomor HP</th>
								<th>Alamat</th>
								<th>Kabupaten/Kota</th>
								<th>Komoditas</th>
								@if (Auth::User())
									<th>Action</th>
								@endif
							</tr>
						</thead>
						<tbody>
							@foreach ($KelompokTani as $DataKelompokTani)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$DataKelompokTani->nip}}</td>
									<td>{{$DataKelompokTani->nama}}</td>
									<td class="text-center">
										<img src="{{asset($DataKelompokTani->foto)}}" alt="{{$DataKelompokTani->nama}}" class="img-circle img img-45 img-thumbnail">
										<br>
										<span class="nowrap">
											{{$DataKelompokTani->nama_ketua}}
										</span>
									</td>
									<td>{{$DataKelompokTani->Penyuluh->nama}}</td>
									<td>{{$DataKelompokTani->nomor_hp}}</td>
									<td>{{$DataKelompokTani->alamat}}</td>
									<td>{{$DataKelompokTani->Kota->nama}}</td>
									<td class="text-center">
										@foreach ($DataKelompokTani->Komoditas as $Komoditas)
											<span class="btn-primary btn-xs span-list">
										    {{$Komoditas->nama}}
										  </span>
										@endforeach
									</td>
									@if (Auth::User())
										<td class="text-center">
											<a href="{{Route('kelompokTaniEditForm', ['id' => $DataKelompokTani->UUID])}}" class="btn btn-info btn-xs">Edit</a>
											<a href="{{Route('kelompokTaniDetail', ['id' => $DataKelompokTani->UUID])}}" class="btn btn-primary btn-xs">Detail</a>
											<button data={{$DataKelompokTani->UUID}} href={{Route('kelompokTaniHapus')}} class="btn btn-warning btn-xs btn-delete">Delete</button>
										</td>
									@endif
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
