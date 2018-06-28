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
					<form class="form-horizontal row-border" action="{{ Route('submit-Tambah-Data-Penyuluh') }}" method="POST">
						{{csrf_field()}}
						<div class="form-group">
							<label class="col-md-2 control-label">NIP</label>
							<div class="col-md-10">
								<input type="text" name="nip" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nama</label>
							<div class="col-md-10">
								<input type="text" name="nama" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Tempat Lahir</label>
							<div class="col-md-10">
								<input type="text" name="tempat_lahir" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Tanggal Lahir</label>
							<div class="col-md-10">
								<input type="date" name="tanggal_lahir" class="form-control" value="{{Tanggal::now()}}" max="{{Tanggal::now()}}" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Agama</label>
							<div class="col-md-10">
								<select name="agama" class="form-control input-lg" required>
									<option value="" selected hidden>Agama</option>
									<option value="Islam">Islam</option>
									<option value="Kristen Protestan">Kristen Protestan</option>
									<option value="Katolik">Katolik</option>
									<option value="Hindu">Hindu</option>
									<option value="Buddha">Buddha</option>
				          <option value="Kong Hu Chu">Kong Hu Chu</option>
				        </select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Jenis Kelamin</label>
							<div class="col-md-10">
								<select name="jenis_kelamin" class="form-control input-lg" required>
									<option value="" selected hidden>Jenis Kelamin</option>
									<option value="Laki-Laki">Laki-Laki</option>
									<option value="Perempuan">Perempuan</option>
				        </select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Status Kawin</label>
							<div class="col-md-10">
								<select name="status_kawin" class="form-control input-lg" required>
									<option value="" selected hidden>Status Kawin</option>
									<option value="Belum Kawin">Belum Kawin</option>
									<option value="Sudah Kawin">Sudah Kawin</option>
				        </select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Pangkat Golongan</label>
							<div class="col-md-10">
								<input type="text" name="pangkat_golongan" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Jabatan</label>
							<div class="col-md-10">
								<input type="text" name="jabatan" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Pendidikan Terakhir</label>
							<div class="col-md-10">
								<select name="pendidikan_terakhir" class="form-control input-lg" required>
									<option value="" selected hidden>Pendidikan Terakhir</option>
									<option value="SD">SD</option>
									<option value="SMP">SMP</option>
									<option value="SMA">SMA</option>
									<option value="DI/II">DI/II</option>
									<option value="S1">S1</option>
				        </select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nomor HP</label>
							<div class="col-md-10">
								<input type="text" name="nomor_hp" class="form-control" required>
							</div>
						</div>
						{{-- DISINI KENA Satuan Kerja dan Unit Kerja --}}
						<field-satkerja
							api = {{Auth::User()->api_token}}
						></field-satkerja>
						<field-unitkerja
							api = {{Auth::User()->api_token}}
						></field-unitkerja>
						<div class="form-group">
							<label class="col-md-2 control-label">Komoditas Unggulan</label>
							<div class="col-md-10">
								<input type="text" name="komoditas_unggulan" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Pelatihan</label>
							<div class="col-md-10">
								<input type="text" name="pelatihan" class="form-control" required>
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
