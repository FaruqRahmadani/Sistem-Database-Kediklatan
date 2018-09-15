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
					<table id="table_kelompoktani" class="table table-hover table-custom">
						<thead>
							<tr>
								<th class="text-center">Nama</th>
								<th class="text-center">Nama Ketua</th>
								<th class="text-center">Penyuluh</th>
								<th class="text-center">Nomor HP</th>
								<th class="text-center">Alamat</th>
								<th class="text-center">Provinsi</th>
								<th class="text-center">Kota</th>
								<th class="text-center">Komoditas</th>
								<th class="text-center" style="width:115px"> Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($Pelatihan->KelompokTani as $DataKelompokTani)
								<tr>
									<td>{{$DataKelompokTani->nama}}</td>
									<td>{{$DataKelompokTani->nama_ketua}}</td>
									<td>{{$DataKelompokTani->Penyuluh->nama}}</td>
									<td>{{$DataKelompokTani->nomor_hp}}</td>
									<td>{{$DataKelompokTani->alamat}}</td>
									<td>{{$DataKelompokTani->Provinsi->nama}}</td>
									<td>{{$DataKelompokTani->Kota->nama}}</td>
									<td class="text-center">
										@foreach ($DataKelompokTani->Komoditas as $Komoditas)
											<span class="btn-primary btn-xs span-list">
										    {{$Komoditas->nama}}
										  </span>
										@endforeach
									</td>
									<td class="text-center">
										<button-delete
											url = {{Route('Hapus-Peserta-Pelatihan', ['idPelatihan' => $Pelatihan->UUID, 'id' => $DataKelompokTani->UUID])}}
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
