@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Data Satuan Kerja</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{Route('satuanKerjaTambahForm')}}" class="btn btn-primary btn-sm">
						<span class="fa fa-plus img-circle text-default"></span>
						Tambah Data
					</a>
					<a href="{{Route('cetakSatuanKerja')}}" class="btn btn-info btn-sm" target="_blank">
				    <span class="fa fa-print img-circle text-default"></span>
				    Cetak
				  </a>
				</div>
				<div class="panel-body">
					<table id="myTable" class="table table-hover table-custom">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Provinsi</th>
								<th>Kota</th>
								<th>Nomor Telepon</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($SatKerja as $Index => $DataSatKerja)
								<tr>
									<td>{{$DataSatKerja->nama}}</td>
									<td>{!!nl2br($DataSatKerja->alamat)!!}</td>
									<td>{{$DataSatKerja->Provinsi->nama}}</td>
									<td>{{$DataSatKerja->Kota->nama}}</td>
									<td>{{$DataSatKerja->nomor_telepon}}</td>
									<td>
										<a href="{{Route('satuanKerjaEditForm', ['id' => $DataSatKerja->UUID])}}" class="btn btn-info btn-xs">Edit</a>
										<button data={{$DataSatKerja->UUID}} href={{Route('userHapus')}} {!!$DataSatKerja->Penyuluh->Count()? 'status = "Data Tidak Dapat Dihapus Karena Ada Relasi"' : ''!!} class="btn btn-warning btn-xs btn-delete">Delete</button>
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
