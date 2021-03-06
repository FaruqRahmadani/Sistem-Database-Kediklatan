@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Data Peserta Pelatihan <small>P4S</small></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{Route('pesertaPelatihanTambahForm', ['idPelatihan' => $Pelatihan->UUID])}}" class="btn btn-primary btn-sm">
						<span class="fa fa-plus img-circle text-default"></span>
						Tambah Data
					</a>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="myTable" class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Nama</th>
									<th>Ketua Kelompok</th>
									<th>No. HP</th>
									<th>Alamat</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($Pelatihan->P4S as $Index=>$DataP4S)
									<tr>
										<td>{{$Index+1}}</td>
										<td>{{$DataP4S->nama}}</td>
										<td>{{$DataP4S->nama_ketua}}</td>
										<td>{{$DataP4S->nomor_hp}}</td>
										<td>{!!nl2br($DataP4S->AlamatLengkap)!!}</td>
										<td>
											<button data={{$DataP4S->UUID}} href={{Route('pesertaPelatihanHapus', ['idPelatihan' => $Pelatihan->UUID])}} class="btn btn-warning btn-xs btn-delete">Delete</button>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
