@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Tambah Satuan Kerja</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{Route('satuanKerjaData')}}" class="btn btn-primary btn-sm">
						<span class="fa fa-reply img-circle text-default"></span>
						Kembali
					</a>
				</div>
				<div class="panel-body">
					<form class="form-horizontal row-border" action="{{ Route('satuanKerjaEditSubmit', ['id' => $SatKerja->UUID]) }}" method="POST">
						{{csrf_field()}}
						<div class="form-group">
							<label class="col-md-2 control-label">Nama Satuan Kerja</label>
							<div class="col-md-10">
								<input type="text" name="nama" class="form-control" value="{{$SatKerja->nama}}" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Alamat</label>
							<div class="col-md-10">
								<textarea name="alamat" rows="2" class="form-control" required>{{$SatKerja->alamat}}</textarea>
							</div>
						</div>
						<field-daerah-provkota
							provinsi = {{$SatKerja->provinsi_id}}
							kota = {{$SatKerja->kota_id}}
							api = {{Auth::User()->api_token}}
						></field-daerah-provkota>
						<div class="form-group">
							<label class="col-md-2 control-label">Nomor Telepon</label>
							<div class="col-md-10">
								<input type="text" name="nomor_telepon" class="form-control" value="{{$SatKerja->nomor_telepon}}" required>
							</div>
						</div>
						<div class="row">
							<div class="text-center">
								<div class="col-md-12">
									<button type="submit" class="btn btn-info btn-fill">Simpan</button>
									<button type="reset" class="btn btn-warning btn-fill">Batal</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
