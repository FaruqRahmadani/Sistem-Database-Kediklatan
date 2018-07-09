@extends('User.Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<button-tambah
						url = {{ Route('Tambah-Kelompok-Tani') }}
					></button-tambah>
					<button-print
						url = {{ Route('Cetak-Unit-Kerja') }}
					></button-print>
				</div>
				<div class="panel-body">
					<table id="table_kelompoktani" class="table table-striped table-advance table-bordered table-custom">
						<thead>
							<tr>
								<th class="text-center"> Nama</th>
								<th class="text-center"> Nama Ketua</th>
								<th class="text-center"> Nomor HP</th>
								<th class="text-center"> Alamat</th>
								<th class="text-center"> Provinsi</th>
								<th class="text-center"> Kota</th>
								<th class="text-center"> Jumlah Komoditas</th>
								<th class="text-center" style="width:115px"> Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($KelompokTani as $DataKelompokTani)
								<tr>
									<td>{{$DataKelompokTani->nama}}</td>
									<td>{{$DataKelompokTani->nama_ketua}}</td>
									<td>{{$DataKelompokTani->nomor_hp}}</td>
									<td>{{$DataKelompokTani->alamat}}</td>
									<td>{{$DataKelompokTani->Provinsi->nama_provinsi}}</td>
									<td>{{$DataKelompokTani->Kota->nama_kota}}</td>
									<td class="text-center">
										@foreach ($DataKelompokTani->Komoditas as $Komoditas)
											<span class="btn-default btn-xs span-list">
										    {{$Komoditas->nama}}
										  </span>
										@endforeach
									</td>
									<td class="text-center">
										<button-edit
											url = {{ Route('Edit-Kelompok-Tani', ['id' => Crypter::Encrypt($DataKelompokTani->id)]) }}
										></button-edit>
										<button-delete
											url = {{ Route('Delete-Data-Komoditas', ['id' => Crypter::Encrypt($DataKelompokTani->id)]) }}
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
