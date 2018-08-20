@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<button-tambah
						url = {{ Route('Tambah-Kota-Komoditas') }}
					></button-tambah>
					<button-print
						url = {{ Route('Cetak-Unit-Kerja') }}
					></button-print>
				</div>
				<div class="panel-body">
					<table id="table_kotakomoditas" class="table table-hover table-custom">
						<thead>
							<tr>
								<th class="text-center"> Provinsi</th>
								<th class="text-center"> Kota</th>
								<th class="text-center"> Komoditas</th>
								<th class="text-center" style="width:15%"> Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($Kota as $DataKota)
								<tr>
									<td>{{$DataKota->Provinsi->nama}}</td>
									<td>{{$DataKota->nama}}</td>
									<td class="text-center">
										@foreach ($DataKota->Komoditas as $Komoditas)
											<span class="badge badge-pill">
										    {{$Komoditas->nama}}
										  </span>
										@endforeach
									</td>
									<td class="text-center">
										<button-edit
											url = {{ Route('Edit-Kota-Komoditas', ['id' => Crypter::Encrypt($DataKota->id)]) }}
										></button-edit>
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
