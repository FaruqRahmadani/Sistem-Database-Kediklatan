@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Data Komoditas</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{Route('komoditasTambahForm')}}" class="btn btn-primary btn-sm">
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
								<th>Keterangan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($Komoditas as $Index=>$DataKomoditas)
								<tr>
									<td>{{$Index+1}}</td>
									<td>{{$DataKomoditas->nama}}</td>
									<td>{!!nl2br($DataKomoditas->keterangan)!!}</td>
									<td class="text-center">
										<a href="{{Route('komoditasEditForm', ['id' => $DataKomoditas->UUID])}}" class="btn btn-info btn-xs">Edit</a>
										<button data={{$DataKomoditas->UUID}} href={{Route('komoditasHapus')}} class="btn btn-warning btn-xs btn-delete">Delete</button>
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
