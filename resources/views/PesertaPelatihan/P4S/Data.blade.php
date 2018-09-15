@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<button-tambah
					url = {{ Route('Tambah-Peserta-Pelatihan', ['idPelatihan' => $Pelatihan->UUID]) }}
					></button-tambah>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="table" class="table table-hover">
							<thead>
								<tr>
									<th class="text-center"> Nama</th>
									<th class="text-center"> Ketua Kelompok</th>
									<th class="text-center"> No. HP</th>
									<th class="text-center"> Alamat</th>
									<th class="text-center"> Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($Pelatihan->P4S as $DataP4S)
									<tr>
										<td>{{$DataP4S->nama}}</td>
										<td>{{$DataP4S->nama_ketua}}</td>
										<td>{{$DataP4S->nomor_hp}}</td>
										<td>{!!nl2br($DataP4S->AlamatLengkap)!!}</td>
										<td class="text-center">
											<button-delete
												url = {{Route('Hapus-Peserta-Pelatihan', ['idPelatihan' => $Pelatihan->UUID, 'id' => $DataP4S->UUID])}}
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
	</div>
@endsection
