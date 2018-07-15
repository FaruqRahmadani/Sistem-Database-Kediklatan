@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<button-kembali
						url = {{ Route('Data-Kelompok-Tani') }}
					></button-kembali>
				</div>
				<div class="panel-body">
					<form class="form-horizontal row-border" action="{{ Route('submit-Edit-Kelompok-Tani', ['id' => Crypter::Encrypt($KelompokTani->id)]) }}" method="POST">
						{{csrf_field()}}
						<div class="form-group">
							<label class="col-md-2 control-label">Nama Kelompok Tani</label>
							<div class="col-md-10">
								<input type="text" name="nama" class="form-control" value="{{$KelompokTani->nama}}" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nama Ketua Kelompok</label>
							<div class="col-md-10">
								<input type="text" name="nama_ketua" class="form-control" value="{{$KelompokTani->nama_ketua}}" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Penyuluh</label>
							<div class="col-md-10">
								<select name="penyuluh_id" class="form-control input-lg" required>
									<option value="">Penyuluh</option>
									@foreach ($Penyuluh as $DataPenyuluh)
										<option value="{{$DataPenyuluh->id}}" {{$KelompokTani->penyuluh_id == $DataPenyuluh->id ? 'selected' : ''}}>{{$DataPenyuluh->nip}} - {{$DataPenyuluh->nama}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nomor HP</label>
							<div class="col-md-10">
								<input type="text" name="nomor_hp" class="form-control" value="{{$KelompokTani->nomor_hp}}" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Alamat</label>
							<div class="col-md-10">
								<input type="text" name="alamat" class="form-control" value="{{$KelompokTani->alamat}}" required>
							</div>
						</div>
						<field-daerah-provkota
							provinsi = {{$KelompokTani->provinsi_id}}
							kota = {{$KelompokTani->kota_id}}
							api = {{Auth::User()->api_token}}
						></field-daerah-provkota>
						<div class="form-group">
							<label class="col-md-2 control-label">Komoditas</label>
							<div class="col-md-10">
								<select id="select2" name="komoditas_id[]" class="form-control input-lg" multiple required>
									@foreach ($Komoditas as $DataKomoditas)
										<option value="{{$DataKomoditas->id}}" {{$KelompokTani->Komoditas->pluck('id')->search($DataKomoditas->id) !== false ? 'selected' : ''}}>{{$DataKomoditas->nama}}</option>
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
