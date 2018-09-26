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
				<div class="panel-heading">
					<a href="{{Route('kelompokTaniTambahForm')}}" class="btn btn-primary btn-sm">
						<span class="fa fa-plus img-circle text-default"></span>
						Tambah Data
					</a>
				</div>
				<div class="panel-body">
					<table id="myTable" data-order-disable="[2]" class="table table-hover table-custom">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama</th>
								<th></th>
								<th>Nama Ketua</th>
								<th>Penyuluh</th>
								<th>Nomor HP</th>
								<th>Alamat</th>
								<th>Provinsi</th>
								<th>Kota</th>
								<th>Komoditas</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($KelompokTani as $Index=>$DataKelompokTani)
								<tr>
									<td>{{$Index+1}}</td>
									<td>{{$DataKelompokTani->nama}}</td>
									<td align="center">
										<img src="{{(Storage::url($DataKelompokTani->foto))}}" alt="{{$DataKelompokTani->nama}}" class="img-circle img img-45 img-thumbnail">
									</td>
									<td>{{$DataKelompokTani->nama_ketua}}</td>
									<td>{{$DataKelompokTani->Penyuluh->nama}}</td>
									<td>{{$DataKelompokTani->nomor_hp}}</td>
									<td>{{$DataKelompokTani->alamat}}</td>
									<td>{{$DataKelompokTani->Provinsi->nama}}</td>
									<td>{{$DataKelompokTani->Kota->nama}}</td>
									<td class="text-center">
										@foreach ($DataKelompokTani->Komoditas as $Komoditas)
											<span class="btn-primary btn-xs span-list">
										    {{$Komoditas->nama}}
										  </span>
										@endforeach
									</td>
									<td class="text-center">
										<a href="{{Route('kelompokTaniEditForm', ['id' => $DataKelompokTani->UUID])}}" class="btn btn-info btn-xs">Edit</a>
										<button data={{$DataKelompokTani->UUID}} href={{Route('kelompokTaniHapus')}} class="btn btn-warning btn-xs btn-delete">Delete</button>
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
