@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Data Peserta Pelatihan <small>Penyuluh</small></h3>
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
								<th>Tempat/Tanggal Lahir</th>
								<th>Agama</th>
								<th>Jenis Kelamin</th>
								<th>Pangkat/Jabatan</th>
								<th>Pendidikan Terakhir</th>
								<th>Nomor HP</th>
								<th>Satuan Kerja</th>
								<th>Unit Kerja</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($Pelatihan->Penyuluh as $Index=>$DataPenyuluh)
								<tr>
									<td>{{$Index+1}}</td>
									<td>{!!$DataPenyuluh->NIPNama!!}</td>
									<td>{{$DataPenyuluh->TTL}}</td>
									<td>{{$DataPenyuluh->agama}}</td>
									<td>{{$DataPenyuluh->jenis_kelamin}}</td>
									<td>{{$DataPenyuluh->PangkatJabatan}}</td>
									<td>{{$DataPenyuluh->pendidikan_terakhir}}</td>
									<td>{{$DataPenyuluh->nomor_hp}}</td>
									<td>{{$DataPenyuluh->SatuanKerja->nama}}</td>
									<td>{{$DataPenyuluh->UnitKerja->nama}}</td>
									<td>
										<button data={{$DataPenyuluh->UUID}} href={{Route('pesertaPelatihanHapus', ['idPelatihan' => $Pelatihan->UUID])}} class="btn btn-warning btn-xs btn-delete">Delete</button>
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
