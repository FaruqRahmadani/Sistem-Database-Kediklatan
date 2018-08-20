@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<button-tambah
						url = {{ Route('Tambah-Satuan-Kerja') }}
					></button-tambah>
					<button-print
						url = {{ Route('Cetak-Satuan-Kerja') }}
					></button-print>
				</div>
				<div class="panel-body">
					<table id="table_satkerja" class="table table-striped table-advance table-bordered table-custom" style="width:100%">
						<thead>
							<tr>
								<th class="text-center"> Nama</th>
								<th class="text-center"> Alamat</th>
								<th class="text-center"> Provinsi</th>
								<th class="text-center"> Kota</th>
								<th class="text-center"> Nomor Telepon</th>
								<th class="text-center" style="width:115px"> Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($SatKerja as $Index => $DataSatKerja)
								<tr>
									<td>{{$DataSatKerja->nama}}</td>
									<td>{{$DataSatKerja->alamat}}</td>
									<td>{{$DataSatKerja->Provinsi->nama}}</td>
									<td>{{$DataSatKerja->Kota->nama}}</td>
									<td>{{$DataSatKerja->nomor_telepon}}</td>
									<td class="text-center">
										<button-edit
											url = {{ Route('Edit-Satuan-Kerja', ['id' => Crypter::Encrypt($DataSatKerja->id)]) }}
										></button-edit>
										<button-delete
											url = {{ Route('Delete-Satuan-Kerja', ['id' => Crypter::Encrypt($DataSatKerja->id)]) }}
											status = {{ $DataSatKerja->Penyuluh->Count() }}
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
