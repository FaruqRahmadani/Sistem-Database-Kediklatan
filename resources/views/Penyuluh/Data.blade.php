@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<button-tambah
						url = {{ Route('Tambah-Penyuluh') }}
					></button-tambah>
					<button-print
						url = {{ Route('Cetak-Penyuluh') }}
					></button-print>
				</div>
				<div class="panel-body">
					<table id="table_penyuluh" class="table table-striped table-advance table-bordered table-custom">
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
							@foreach ($Penyuluh as $Index => $DataPenyuluh)
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
										<button-edit
											url = {{ Route('Edit-Penyuluh', ['id' => Crypter::Encrypt($DataPenyuluh->id)]) }}
										></button-edit>
										<button-delete
											url = {{ Route('Delete-Penyuluh', ['id' => Crypter::Encrypt($DataPenyuluh->id)]) }}
											status = {{ $DataPenyuluh->KelompokTani->count() }}
											pesan = "Data Tidak Dapat Dihapus Karena Ada Relasi"
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
