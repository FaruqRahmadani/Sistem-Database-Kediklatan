@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<button-tambah
						url = {{ Route('Tambah-Unit-Kerja') }}
					></button-tambah>
					<button-print
						url = {{ Route('Cetak-Unit-Kerja') }}
					></button-print>
				</div>
				<div class="panel-body">
					<table id="table_unitkerja" class="table table-hover table-custom">
						<thead>
							<tr>
								<th class="text-center" style="width:250px"> Nama</th>
								<th class="text-center"> Alamat</th>
								<th class="text-center" style="width:115px"> Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($UnitKerja as $Index => $DataUnitKerja)
								<tr>
									<td>{{$DataUnitKerja->nama}}</td>
									<td>{{$DataUnitKerja->alamat}}</td>
									<td class="text-center">
										<button-edit
											url = {{ Route('Edit-Unit-Kerja', ['id' => Crypter::Encrypt($DataUnitKerja->id)]) }}
										></button-edit>
										<button-delete
											url = {{ Route('Delete-Unit-Kerja', ['id' => Crypter::Encrypt($DataUnitKerja->id)]) }}
											status = {{ $DataUnitKerja->Penyuluh->Count() }}
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
