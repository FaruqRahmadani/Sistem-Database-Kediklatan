@extends('User.Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<button-kembali
					url = {{ Route('Data-Unit-Kerja') }}
					></button-kembali>
				</div>
				<div class="panel-body">
					<form class="form-horizontal row-border" action="{{ Route('submit-Tambah-Kelompok-Tani') }}" method="POST">
						{{csrf_field()}}
						<div class="form-group">
							<label class="col-md-2 control-label">Nama Kelompok Tani</label>
							<div class="col-md-10">
								<input type="text" name="nama" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nama Ketua Kelompok</label>
							<div class="col-md-10">
								<input type="text" name="nama_ketua" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nomor HP</label>
							<div class="col-md-10">
								<input type="text" name="nomor_hp" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Alamat</label>
							<div class="col-md-10">
								<input type="text" name="alamat" class="form-control" required>
							</div>
						</div>
						<field-daerah-provkota
							api = {{Auth::User()->api_token}}
						></field-daerah-provkota>
						<div class="form-group">
							<label class="col-md-2 control-label">Komoditas</label>
							<div class="col-md-10">
								<select id="select2" name="komoditas_id" class="form-control input-lg" multiple required>
									@foreach ($Komoditas as $DataKomoditas)
										<option value="{{$DataKomoditas->id}}">{{$DataKomoditas->nama}}</option>
									@endforeach
				        </select>
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
