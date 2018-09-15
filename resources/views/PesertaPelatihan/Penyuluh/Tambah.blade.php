@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<form action="{{Route('submit-Tambah-Peserta-Pelatihan', ['id' => $Pelatihan->UUID])}}" method="post">
					@csrf
					<div class="panel-body">
						<table id="table_penyuluh" class="table table-hover table-custom">
							<thead>
								<tr>
									<th class="text-center"></th>
									<th class="text-center"> Nama</th>
									<th class="text-center"> Tempat/Tanggal Lahir</th>
									<th class="text-center"> Agama</th>
									<th class="text-center"> Jenis Kelamin</th>
									<th class="text-center"> Pangkat/Jabatan</th>
									<th class="text-center"> Pendidikan Terakhir</th>
									<th class="text-center"> Nomor HP</th>
									<th class="text-center"> Satuan Kerja</th>
									<th class="text-center"> Unit Kerja</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($Peserta as $Index => $DataPeserta)
									<tr>
										<td>
											<input type="checkbox" name="id[]" value="{{$DataPeserta->id}}" {{$Pelatihan->Penyuluh->pluck('id')->search($DataPeserta->id) !== false ? 'checked' : ''}}>
										</td>
										<td>
											({{$DataPeserta->nip}})<br>
											{{$DataPeserta->nama}}
										</td>
										<td>{{$DataPeserta->tempat_lahir}}, {{Tanggal::Format($DataPeserta->tanggal_lahir)}}</td>
										<td>{{$DataPeserta->agama}}</td>
										<td>{{$DataPeserta->jenis_kelamin}}</td>
										<td>{{$DataPeserta->pangkat_golongan}}/{{$DataPeserta->jabatan}}</td>
										<td>{{$DataPeserta->pendidikan_terakhir}}</td>
										<td>{{$DataPeserta->nomor_hp}}</td>
										<td>{{$DataPeserta->SatuanKerja->nama}}</td>
										<td>{{$DataPeserta->UnitKerja->nama}}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div class="panel-footer">
							<div class="text-right">
								<div class="col-md-12">
									<button type="submit" class="btn btn-info btn-lg btn-fill">Simpan</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
