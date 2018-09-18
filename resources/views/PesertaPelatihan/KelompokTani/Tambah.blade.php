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
				<form action="{{Route('submit-Tambah-Peserta-Pelatihan', ['id' => $Pelatihan->UUID])}}" method="post">
					@csrf
					<div class="panel-body">
						<table id="table_kelompoktani" class="table table-hover table-custom">
							<thead>
								<tr>
									<th class="text-center"></th>
									<th class="text-center">Nama</th>
									<th class="text-center">Nama Ketua</th>
									<th class="text-center">Penyuluh</th>
									<th class="text-center">Nomor HP</th>
									<th class="text-center">Alamat</th>
									<th class="text-center">Provinsi</th>
									<th class="text-center">Kota</th>
									<th class="text-center">Komoditas</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($Peserta as $DataPeserta)
									<tr>
										<td>
											<input type="checkbox" name="id[]" value="{{$DataPeserta->id}}" {{$Pelatihan->KelompokTani->pluck('id')->search($DataPeserta->id) !== false ? 'checked' : ''}}>
										</td>
										<td>{{$DataPeserta->nama}}</td>
										<td>{{$DataPeserta->nama_ketua}}</td>
										<td>{{$DataPeserta->Penyuluh->nama}}</td>
										<td>{{$DataPeserta->nomor_hp}}</td>
										<td>{{$DataPeserta->alamat}}</td>
										<td>{{$DataPeserta->Provinsi->nama}}</td>
										<td>{{$DataPeserta->Kota->nama}}</td>
										<td class="text-center">
											@foreach ($DataPeserta->Komoditas as $Komoditas)
												<span class="btn-primary btn-xs span-list">
													{{$Komoditas->nama}}
												</span>
											@endforeach
										</td>
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