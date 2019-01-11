@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Data P4S</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				@if (Auth::User())
					<div class="panel-heading">
						<a href="{{Route('p4sTambahForm')}}" class="btn btn-primary btn-sm">
							<span class="fa fa-plus img-circle text-default"></span>
							Tambah Data
						</a>
						<a href="{{Route('cetakP4s')}}" class="btn btn-info btn-sm" target="_blank">
							<span class="fa fa-print img-circle text-default"></span>
							Cetak
						</a>
						<a href="{{Route('p4sExport')}}" class="btn btn-default btn-sm text-right">
							<span class="fa fa-print img-circle text-default"></span>
							Export Excel
						</a>
					</div>
				@endif
				<div class="panel-body">
					<table id="myTable" data-order-disable="[2]" class="table table-hover table-custom">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama</th>
								<th>Ketua Kelompok</th>
								<th>No. HP</th>
								<th>Alamat</th>
								@if (Auth::User())
									<th>Action</th>
								@endif
							</tr>
						</thead>
						<tbody>
							@foreach ($P4S as $Index=>$DataP4S)
								<tr>
									<td>{{$Index+1}}</td>
									<td>{{$DataP4S->nama}}</td>
									<td align="center">
										<img src="{{asset($DataP4S->foto)}}" alt="{{$DataP4S->nama}}" class="img-circle img img-45 img-thumbnail">
										<br>
										<span class="nowrap">
											{{$DataP4S->nama_ketua}}
										</span>
									</td>
									<td>{{$DataP4S->nomor_hp}}</td>
									<td>{!!nl2br($DataP4S->AlamatLengkap)!!}</td>
									@if (Auth::User())
										<td>
											<a href="{{Route('p4sEditForm', ['id' => $DataP4S->UUID])}}" class="btn btn-info btn-xs">Edit</a>
											<a href="{{Route('p4sDetail', ['id' => $DataP4S->UUID])}}" class="btn btn-primary btn-xs">Detail</a>
											<button data={{$DataP4S->UUID}} href={{Route('p4sHapus')}} class="btn btn-warning btn-xs btn-delete">Delete</button>
										</td>
									@endif
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
