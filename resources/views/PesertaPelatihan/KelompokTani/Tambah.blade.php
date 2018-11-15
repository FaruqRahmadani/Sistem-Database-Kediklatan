@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Tambah Peserta Pelatihan <small>Kelompok Tani</small></h3>
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
									<th>Nama Ketua</th>
									<th>Penyuluh</th>
									<th>Nomor HP</th>
									<th>Alamat</th>
									<th>Kota</th>
									<th>Komoditas</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($Peserta as $Index=>$DataPeserta)
									<tr>
										<td>{{$Index+1}}</td>
										<td>
											<input type="checkbox" name="id[]" value="{{$DataPeserta->id}}" {{$Pelatihan->KelompokTani->pluck('id')->search($DataPeserta->id) !== false ? 'checked' : ''}}>
										</td>
										<td>{{$DataPeserta->nama}}</td>
										<td>{{$DataPeserta->nama_ketua}}</td>
										<td>{{$DataPeserta->Penyuluh->nama}}</td>
										<td>{{$DataPeserta->nomor_hp}}</td>
										<td>{{$DataPeserta->alamat}}</td>
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
