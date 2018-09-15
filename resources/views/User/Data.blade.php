@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Data User</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{Route('userTambahForm')}}" class="btn btn-primary btn-sm">
						<span class="fa fa-plus img-circle text-default"></span>
						Tambah Data
					</a>
				</div>
				<div class="panel-body">
					<table id="table" class="table table-striped table-advance table-custom">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">Nama</th>
								<th class="text-center">Username</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($User as $Index=>$DataUser)
								<tr>
									<td>{{$Index+1}}</td>
									<td>{{$DataUser->nama}}</td>
									<td>{{$DataUser->username}}</td>
									<td class="text-center">
										<a href="{{Route('userEditForm', ['id' => $DataUser->UUID])}}" class="btn btn-info btn-xs">Edit</a>
										<button data={{$DataUser->UUID}} href={{Route('userHapus')}} class="btn btn-warning btn-xs btn-delete">Delete</button>
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
