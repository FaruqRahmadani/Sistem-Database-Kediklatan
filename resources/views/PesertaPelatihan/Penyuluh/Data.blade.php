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
					<table id="table_penyuluh" class="table table-hover table-custom">
						<thead>
							<tr>
								<th class="text-center"> Nama</th>
								<th class="text-center"> Tempat/Tanggal Lahir</th>
								<th class="text-center"> Agama</th>
								<th class="text-center"> Jenis Kelamin</th>
								<th class="text-center"> Pangkat/Jabatan</th>
								<th class="text-center"> Pendidikan Terakhir</th>
								<th class="text-center"> Nomor HP</th>
								<th class="text-center"> Satuan Kerja</th>
								<th class="text-center"> Unit Kerja</th>
								<th class="text-center"> Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($Pelatihan->Penyuluh as $Index => $DataPenyuluh)
								<tr>
									<td>
										({{$DataPenyuluh->nip}})<br>
										{{$DataPenyuluh->nama}}
									</td>
									<td>{{$DataPenyuluh->tempat_lahir}}, {{Tanggal::Format($DataPenyuluh->tanggal_lahir)}}</td>
									<td>{{$DataPenyuluh->agama}}</td>
									<td>{{$DataPenyuluh->jenis_kelamin}}</td>
									<td>{{$DataPenyuluh->pangkat_golongan}}/{{$DataPenyuluh->jabatan}}</td>
									<td>{{$DataPenyuluh->pendidikan_terakhir}}</td>
									<td>{{$DataPenyuluh->nomor_hp}}</td>
									<td>{{$DataPenyuluh->SatuanKerja->nama}}</td>
									<td>{{$DataPenyuluh->UnitKerja->nama}}</td>
									<td class="text-center">
										<button-delete
											url = {{Route('Hapus-Peserta-Pelatihan', ['idPelatihan' => $Pelatihan->UUID, 'id' => $DataPenyuluh->UUID])}}
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