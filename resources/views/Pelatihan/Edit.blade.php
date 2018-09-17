@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Edit Pelatihan</h3>
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
					<form class="form-horizontal row-border" action="{{Route('pelatihanEditSubmit', ['id' => $Pelatihan->UUID])}}" method="POST">
						@csrf
						<div class="form-group">
							<label class="col-md-2 control-label">Nama</label>
							<div class="col-md-10">
								<input type="text" name="nama" class="form-control" value="{{$Pelatihan->nama}}" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Tanggal Pelatihan</label>
							<div class="col-md-10">
								<input type="date" name="tanggal" class="form-control" value="{{$Pelatihan->tanggal}}" min="{{HDate::now()}}" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Tipe Pelatihan</label>
							<div class="col-md-10">
								<select name="tipe" class="form-control input-lg" required>
									<option value="" selected hidden>Tipe Pelatihan</option>
									<option value="1" {{$Pelatihan->tipe==1? 'selected' : ''}}>Penyuluh</option>
									<option value="2" {{$Pelatihan->tipe==2? 'selected' : ''}}>Kelompok Tani</option>
									<option value="3" {{$Pelatihan->tipe==3? 'selected' : ''}}>P4S</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Keterangan</label>
							<div class="col-md-10">
								<textarea name="keterangan" rows="2" class="form-control">{{$Pelatihan->keterangan}}</textarea>
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
