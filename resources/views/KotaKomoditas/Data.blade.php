@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Data Kota Komoditas</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{Route('kotaKomoditasTambahForm')}}" class="btn btn-primary btn-sm">
						<span class="fa fa-plus img-circle text-default"></span>
						Tambah Data
					</a>
				</div>
				<div class="panel-body">
					<table id="myTable" class="table table-hover table-custom">
						<thead>
							<tr>
								<th>#</th>
								<th>Provinsi</th>
								<th>Kota</th>
								<th>Komoditas</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($Kota as $Index=>$DataKota)
								<tr>
									<td>{{$Index+1}}</td>
									<td>{{$DataKota->Provinsi->nama}}</td>
									<td>{{$DataKota->nama}}</td>
									<td class="nowrap">
										@foreach ($DataKota->Komoditas as $Komoditas)
											<span class="badge">
										    {{$Komoditas->nama}}
										  </span>
										@endforeach
									</td>
									<td class="text-center">
										<a href="{{Route('kotaKomoditasEditForm', ['id' => $DataKota->UUID])}}" class="btn btn-info btn-xs">Edit</a>
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
