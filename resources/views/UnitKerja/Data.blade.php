@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Data Unit Kerja</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{Route('unitKerjaTambahForm')}}" class="btn btn-primary btn-sm">
						<span class="fa fa-plus img-circle text-default"></span>
						Tambah Data
					</a>
					<a href="{{Route('cetakUnitKerja')}}" class="btn btn-info btn-sm" target="_blank">
				    <span class="fa fa-print img-circle text-default"></span>
				    Cetak
				  </a>
				</div>
				<div class="panel-body">
					<table id="myTable" class="table table-hover table-custom">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($UnitKerja as $Index=>$DataUnitKerja)
								<tr>
									<td>{{$Index+1}}</td>
									<td>{{$DataUnitKerja->nama}}</td>
									<td>{{$DataUnitKerja->alamat}}</td>
									<td class="text-center">
										<a href="{{Route('satuanKerjaEditForm', ['id' => $DataUnitKerja->UUID])}}" class="btn btn-info btn-xs">Edit</a>
										<button data={{$DataUnitKerja->UUID}} href={{Route('satuanKerjaHapus')}} {!!$DataUnitKerja->Penyuluh->Count()? 'status = "Data Tidak Dapat Dihapus Karena Ada Relasi"' : ''!!} class="btn btn-warning btn-xs btn-delete">Delete</button>
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
