@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Tambah Peserta Pelatihan <small>Penyuluh</small></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<form action="{{Route('pesertaPelatihanTambahSubmit', ['id' => $Pelatihan->UUID])}}" method="post">
					@csrf
					<div class="panel-body">
						<table id="myTable" class="table table-hover table-custom">
							<thead>
								<tr>
									<th>#</th>
									<th></th>
									<th>Nama</th>
									<th>Tempat/Tanggal Lahir</th>
									<th>Agama</th>
									<th>Jenis Kelamin</th>
									<th>Pangkat/Jabatan</th>
									<th>Pendidikan Terakhir</th>
									<th>Nomor HP</th>
									<th>Satuan Kerja</th>
									<th>Unit Kerja</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($Peserta as $Index=>$DataPeserta)
									<tr>
										<td>{{$Index+1}}</td>
										<td>
											<input type="checkbox" name="id[]" value="{{$DataPeserta->id}}" {{$Pelatihan->Penyuluh->pluck('id')->search($DataPeserta->id) !== false ? 'checked' : ''}}>
										</td>
										<td>{!!$DataPeserta->NIPNama!!}</td>
										<td>{{$DataPeserta->TTL}}</td>
										<td>{{$DataPeserta->agama}}</td>
										<td>{{$DataPeserta->jenis_kelamin}}</td>
										<td>{{$DataPeserta->PangkatJabatan}}</td>
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
