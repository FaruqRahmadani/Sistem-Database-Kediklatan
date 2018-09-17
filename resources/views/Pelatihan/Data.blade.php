@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Data Pelatihan</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{Route('pelatihanTambahForm')}}" class="btn btn-primary btn-sm">
						<span class="fa fa-plus img-circle text-default"></span>
						Tambah Data
					</a>
				</div>
				<div class="panel-body">
					<table id="myTable" class="table table-hover table-custom">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th>Nama</th>
								<th>Tanggal Pelatihan</th>
								<th>Tipe</th>
								<th>Keterangan</th>
								<th>Peserta</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($Pelatihan as $Index => $DataPelatihan)
								<tr>
									<td>{{$Index+1}}</td>
									<td>{{$DataPelatihan->nama}}</td>
									<td>{{HDate::DateFormat($DataPelatihan->tanggal)}}</td>
									<td>{{$DataPelatihan->TipeText}}</td>
									<td>{!!nl2br($DataPelatihan->keterangan)!!}</td>
									<td><button class="btn btn-xs btn-primary">Lihat</button></td>
									<td class="text-center">
										<a href="{{Route('pelatihanEditForm', ['id' => $DataPelatihan->UUID])}}" class="btn btn-info btn-xs">Edit</a>
										<button data={{$DataPelatihan->UUID}} href={{Route('pelatihanHapus')}} class="btn btn-warning btn-xs btn-delete">Delete</button>
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
