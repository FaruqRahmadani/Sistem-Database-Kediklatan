@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<button-tambah
						url = {{ Route('Tambah-Pelatihan') }}
					></button-tambah>
				</div>
				<div class="panel-body">
					<table id="table_penyuluh" class="table table-hover table-custom">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th>Nama</th>
								<th>Tanggal Pelatihan</th>
								<th>Tipe</th>
								<th>Keterangan</th>
								<th>Peserta</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($Pelatihan as $Index => $DataPelatihan)
								<tr>
									<td>{{$Index+1}}</td>
									<td>{{$DataPelatihan->nama}}</td>
									<td>{{Tanggal::Format($DataPelatihan->tanggal)}}</td>
									<td>{{$DataPelatihan->TipeText}}</td>
									<td>{!!nl2br($DataPelatihan->keterangan)!!}</td>
									<td><button class="btn btn-xs btn-primary">Lihat</button></td>
									<td class="text-center">
										<button-edit
											url = {{ Route('Edit-Pelatihan', ['id' => $DataPelatihan->UUID]) }}
										></button-edit>
										<button-delete
											url = {{ Route('Delete-Pelatihan', ['id' => $DataPelatihan->UUID]) }}
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
