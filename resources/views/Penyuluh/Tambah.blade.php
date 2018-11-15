@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Tambah Penyuluh</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{Route('penyuluhData')}}" class="btn btn-primary btn-sm">
						<span class="fa fa-reply img-circle text-default"></span>
						Kembali
					</a>
				</div>
				<div class="panel-body">
					<form class="form-horizontal row-border" action="{{Route('penyuluhTambahForm')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label class="col-md-2 control-label">NIK/NIP</label>
							<div class="col-md-10">
								<input type="text" name="nip" value="{{old('nip')}}" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nama</label>
							<div class="col-md-10">
								<input type="text" name="nama" value="{{old('nama')}}" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Tempat Lahir</label>
							<div class="col-md-10">
								<input type="text" name="tempat_lahir" value="{{old('tempat_lahir')}}" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Tanggal Lahir</label>
							<div class="col-md-10">
								<input type="date" name="tanggal_lahir" class="form-control" value="{{old('tanggal_lahir')??HDate::now()}}" max="{{HDate::now()}}" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Agama</label>
							<div class="col-md-10">
								<select name="agama" class="form-control input-lg" required>
									<option value="" selected hidden>Agama</option>
									<option value="Islam" @if(old('agama')=="Islam") selected @endif>Islam</option>
									<option value="Kristen Protestan" @if(old('agama')=="Kristen Protestan") selected @endif>Kristen Protestan</option>
									<option value="Katolik" @if(old('agama')=="Katolik") selected @endif>Katolik</option>
									<option value="Hindu" @if(old('agama')=="Hindu") selected @endif>Hindu</option>
									<option value="Buddha" @if(old('agama')=="Buddha") selected @endif>Buddha</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Jenis Kelamin</label>
							<div class="col-md-10">
								<select name="jenis_kelamin" class="form-control input-lg" required>
									<option value="" selected hidden>Jenis Kelamin</option>
									<option value="Laki-Laki" @if(old('jenis_kelamin')=="Laki-Laki") selected @endif>Laki-Laki</option>
									<option value="Perempuan" @if(old('jenis_kelamin')=="Perempuan") selected @endif>Perempuan</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Status Kawin</label>
							<div class="col-md-10">
								<select name="status_kawin" class="form-control input-lg" required>
									<option value="" selected hidden>Status Kawin</option>
									<option value="Belum Kawin" @if(old('status_kawin')=="Belum Kawin") selected @endif>Belum Kawin</option>
									<option value="Sudah Kawin" @if(old('status_kawin')=="Sudah Kawin") selected @endif>Sudah Kawin</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Pangkat Golongan</label>
							<div class="col-md-10">
								<input type="text" name="pangkat_golongan" value="{{old('pangkat_golongan')}}" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Jabatan</label>
							<div class="col-md-10">
								<input type="text" name="jabatan" value="{{old('jabatan')}}" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Pendidikan Terakhir</label>
							<div class="col-md-10">
								<select name="pendidikan_terakhir" class="form-control input-lg" required>
									<option value="" selected hidden>Pendidikan Terakhir</option>
									<option value="SD" @if(old('pendidikan_terakhir')=="SD") selected @endif>SD</option>
									<option value="SMP" @if(old('pendidikan_terakhir')=="SMP") selected @endif>SMP</option>
									<option value="SMA" @if(old('pendidikan_terakhir')=="SMA") selected @endif>SMA</option>
									<option value="DI/II" @if(old('pendidikan_terakhir')=="DI/DII") selected @endif>DI/II</option>
									<option value="S1" @if(old('pendidikan_terakhir')=="S1") selected @endif>S1</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nomor HP</label>
							<div class="col-md-10">
								<input type="text" name="nomor_hp" value="{{old('nomor_hp')}}" class="form-control" required>
							</div>
						</div>
						<field-satkerja
							api = {{Auth::User()->api_token}}
							SatKerja = {{old('satuan_kerja_id')}}
						></field-satkerja>
						<field-unitkerja
							api = {{Auth::User()->api_token}}
							UnitKerja = {{old('satuan_kerja_id')}}
						></field-unitkerja>
						<div class="form-group">
							<label class="col-md-2 control-label">Foto</label>
							<div class="col-md-10">
								<input type="file" name="foto" class="form-control">
								<small>*Ukuran Foto 1:1</small>
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
