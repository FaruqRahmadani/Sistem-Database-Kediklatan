@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Data Admin</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{Route('adminTambahForm')}}" class="btn btn-primary btn-sm">
						<span class="fa fa-plus img-circle text-default"></span>
						Tambah Data
					</a>
				</div>
				<div class="panel-body">
					<table id="myTable" class="table table-striped table-advance table-custom">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama</th>
								<th>Username</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($admin as $DataAdmin)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>
										<img src="{{asset($DataAdmin->foto)}}" alt="{{$DataAdmin->nama}}" class="img-circle img img-45 img-thumbnail">
										{{$DataAdmin->nama}}
									</td>
									<td>{{$DataAdmin->User->username}}</td>
									<td>
										<a href="{{Route('adminEditForm', ['id' => $DataAdmin->UUID])}}" class="btn btn-info btn-xs">Edit</a>
										<button data={{$DataAdmin->UUID}} href={{Route('adminHapus')}} class="btn btn-warning btn-xs btn-delete" @if (Auth::User()->Data->id == $DataAdmin->id) status="Tidak Dapat Menghapus Data Sendiri" @endif>Delete</button>
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
