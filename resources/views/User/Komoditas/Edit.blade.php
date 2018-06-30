@extends('User.Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<button-kembali
					url = {{ Route('Data-Komoditas') }}
					></button-kembali>
				</div>
				<div class="panel-body">
					<form class="form-horizontal row-border" action="{{ Route('submit-Edit-Data-Komoditas', ['Id' => Crypter::Encrypt($Komoditas->id)]) }}" method="POST">
						{{csrf_field()}}
						<div class="form-group">
							<label class="col-md-2 control-label">Nama Komoditas</label>
							<div class="col-md-10">
								<input type="text" name="nama" class="form-control" required value="{{$Komoditas->nama}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Keterangan</label>
							<div class="col-md-10">
								<textarea rows="4" cols="50" name="keterangan" class="form-control" required>{{$Komoditas->keterangan}}</textarea>
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
