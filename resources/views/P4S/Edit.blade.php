@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<button-kembali
					url = {{ Route('Data-P4S') }}
					></button-kembali>
				</div>
				<div class="panel-body">
					<form class="form-horizontal row-border" action="{{ Route('submit-Edit-P4S', ['id' => Crypter::Encrypt($P4S->id)]) }}" method="POST">
						{{csrf_field()}}
						<div class="form-group">
							<label class="col-md-2 control-label">Nama</label>
							<div class="col-md-10">
								<input type="text" name="nama" class="form-control" required value="{{$P4S->nama}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nama Ketua</label>
							<div class="col-md-10">
								<input type="text" name="nama_ketua" class="form-control" required value="{{$P4S->nama_ketua}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nomor HP</label>
							<div class="col-md-10">
								<input type="text" name="nomor_hp" class="form-control" required value="{{$P4S->nomor_hp}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Alamat</label>
							<div class="col-md-10">
								<textarea name="alamat" class="form-control" rows="4" required>{{$P4S->alamat}}</textarea>
							</div>
						</div>
						<field-daerah-provkota
							provinsi = {{$P4S->Kota->Provinsi->id}}
							kota = {{$P4S->kota_id}}
							api = {{Auth::User()->api_token}}
						></field-daerah-provkota>
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
