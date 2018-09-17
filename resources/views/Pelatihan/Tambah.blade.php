@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Tambah Pelatihan</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{Route('pelatihanData')}}" class="btn btn-primary btn-sm">
						<span class="fa fa-reply img-circle text-default"></span>
						Kembali
					</a>
				</div>
				<div class="panel-body">
					<form class="form-horizontal row-border" action="{{Route('pelatihanTambahSubmit')}}" method="POST">
						@csrf
						<div class="form-group">
							<label class="col-md-2 control-label">Nama Pelatihan</label>
							<div class="col-md-10">
								<input type="text" name="nama" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Tanggal Pelatihan</label>
							<div class="col-md-10">
								<input type="date" name="tanggal" class="form-control" value="{{HDate::now()}}" min="{{HDate::now()}}" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Tipe Pelatihan</label>
							<div class="col-md-10">
								<select name="tipe" class="form-control input-lg" required>
									<option value="" selected hidden>Tipe Pelatihan</option>
									<option value="1">Penyuluh</option>
									<option value="2">Kelompok Tani</option>
									<option value="3">P4S</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Keterangan</label>
							<div class="col-md-10">
								<textarea name="keterangan" rows="2" class="form-control"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="text-center">
								<div class="col-md-12">
									<button id="submit" type="submit" class="btn btn-info btn-fill">Simpan</button>
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
