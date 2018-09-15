@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<form action="{{Route('submit-Tambah-Peserta-Pelatihan', ['id' => $Pelatihan->UUID])}}" method="post">
					@csrf
					<div class="panel-body">
						<div class="table-responsive">
							<table id="table" class="table table-hover">
								<thead>
									<tr>
										<th class="text-center"></th>
										<th class="text-center"> Nama</th>
										<th class="text-center"> Ketua Kelompok</th>
										<th class="text-center"> No. HP</th>
										<th class="text-center"> Alamat</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($Peserta as $DataPeserta)
										<tr>
											<td>
												<input type="checkbox" name="p4_s_id[]" value="{{$DataPeserta->id}}" {{$Pelatihan->P4S->pluck('id')->search($DataPeserta->id) !== false ? 'checked' : ''}}>
											</td>
											<td>{{$DataPeserta->nama}}</td>
											<td>{{$DataPeserta->nama_ketua}}</td>
											<td>{{$DataPeserta->nomor_hp}}</td>
											<td>{!!nl2br($DataPeserta->AlamatLengkap)!!}</td>
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
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
