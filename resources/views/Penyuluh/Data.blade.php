@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Data Penyuluh</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{Route('penyuluhTambahForm')}}" class="btn btn-primary btn-sm">
						<span class="fa fa-plus img-circle text-default"></span>
						Tambah Data
					</a>
					<a href="{{Route('cetakPenyuluh')}}" class="btn btn-info btn-sm" target="_blank">
				    <span class="fa fa-print img-circle text-default"></span>
				    Cetak
				  </a>
				</div>
				<div class="panel-body">
					<table id="myTable" data-order-disable="[1]" class="table table-hover table-custom">
						<thead>
							<tr>
								<th>#</th>
								<th></th>
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
							@foreach ($Penyuluh as $Index=>$DataPenyuluh)
								<tr>
									<td>{{$Index+1}}</td>
									<td align="center">
										<img src="{{asset($DataPenyuluh->foto)}}" alt="{{$DataPenyuluh->nama}}" class="img-circle img img-45 img-thumbnail">
									</td>
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
										<a href="{{Route('penyuluhEditForm', ['id' => $DataPenyuluh->UUID])}}" class="btn btn-info btn-xs">Edit</a>
										<button data={{$DataPenyuluh->UUID}} href={{Route('penyuluhHapus')}} class="btn btn-warning btn-xs btn-delete">Delete</button>
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
