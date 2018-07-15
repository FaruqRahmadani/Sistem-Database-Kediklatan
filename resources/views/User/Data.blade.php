@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<button-tambah
						url = {{ Route('Tambah-User') }}
					></button-tambah>
				</div>
				<div class="panel-body">
					<table id="table_unitkerja" class="table table-striped table-advance table-bordered table-custom">
						<thead>
							<tr>
								<th class="text-center" style="width:250px"> Nama</th>
								<th class="text-center"> Username</th>
								<th class="text-center" style="width:115px"> Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($User as $DataUser)
								<tr>
									<td>{{$DataUser->nama}}</td>
									<td>{{$DataUser->username}}</td>
									<td class="text-center">
										<button-edit
											url = {{ Route('Edit-User', ['id' => Crypter::Encrypt($DataUser->id)]) }}
										></button-edit>
										<button-delete
											url = {{ Route('Delete-User', ['id' => Crypter::Encrypt($DataUser->id)]) }}
										></button-delete>
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
