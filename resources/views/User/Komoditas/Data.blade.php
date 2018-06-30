@extends('User.Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<button-tambah
						url = {{ Route('Tambah-Data-Komoditas') }}
					></button-tambah>
					<button-print
						url = {{ Route('Cetak-Unit-Kerja') }}
					></button-print>
				</div>
				<div class="panel-body">
					<table id="table_komoditas" class="table table-striped table-advance table-bordered">
						<thead>
							<tr>
								<th class="text-center"> #</th>
								<th class="text-center"> Nama</th>
								<th class="text-center"> Keterangan</th>
								<th class="text-center" style="width:15%"> Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($Komoditas as $Index => $DataKomoditas)
								<tr>
									<td class="text-center">{{$Index+=1}}</td>
									<td>{{$DataKomoditas->nama}}</td>
									<td>{!!nl2br($DataKomoditas->keterangan)!!}</td>
									<td class="text-center">
										<button-edit
											url = {{ Route('Edit-Data-Komoditas', ['id' => Crypter::Encrypt($DataKomoditas->id)]) }}
										></button-edit>
										<button-delete
											url = {{ Route('Delete-Data-Komoditas', ['id' => Crypter::Encrypt($DataKomoditas->id)]) }}
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
