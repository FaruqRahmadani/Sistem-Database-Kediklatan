@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Ubah Data
        <small>P4S</small>
      </h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<form class="form-horizontal row-border" action="{{Route('ubahDataSubmit')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label class="col-md-2 control-label">NIK/NIP</label>
							<div class="col-md-10">
								<input type="text" name="nip" class="form-control" value="{{$Penyuluh->nip}}" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nama</label>
							<div class="col-md-10">
								<input type="text" name="nama" class="form-control" value="{{$Penyuluh->nama}}" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Tempat Lahir</label>
							<div class="col-md-10">
								<input type="text" name="tempat_lahir" class="form-control" value="{{$Penyuluh->tempat_lahir}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Tanggal Lahir</label>
							<div class="col-md-10">
								<input type="date" name="tanggal_lahir" class="form-control" value="{{$Penyuluh->tanggal_lahir}}" max="{{HDate::now()}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Agama</label>
							<div class="col-md-10">
								<select name="agama" class="form-control input-lg">
									<option value="" selected hidden>Agama</option>
									<option value="Islam" {{$Penyuluh->agama == 'Islam' ? 'selected' : ''}}>Islam</option>
									<option value="Kristen Protestan" {{$Penyuluh->agama == 'Kristen Protestan' ? 'selected' : ''}}>Kristen Protestan</option>
									<option value="Katolik" {{$Penyuluh->agama == 'Katolik' ? 'selected' : ''}}>Katolik</option>
									<option value="Hindu" {{$Penyuluh->agama == 'Hindu' ? 'selected' : ''}}>Hindu</option>
									<option value="Buddha" {{$Penyuluh->agama == 'Buddha' ? 'selected' : ''}}>Buddha</option>
				        </select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Jenis Kelamin</label>
							<div class="col-md-10">
								<select name="jenis_kelamin" class="form-control input-lg">
									<option value="" selected hidden>Jenis Kelamin</option>
									<option value="Laki-Laki" {{$Penyuluh->jenis_kelamin == 'Laki-Laki' ? 'selected' : ''}}>Laki-Laki</option>
									<option value="Perempuan" {{$Penyuluh->jenis_kelamin == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
				        </select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Status Kawin</label>
							<div class="col-md-10">
								<select name="status_kawin" class="form-control input-lg">
									<option value="" selected hidden>Status Kawin</option>
									<option value="Belum Kawin" {{$Penyuluh->status_kawin == 'Belum Kawin' ? 'selected' : ''}}>Belum Kawin</option>
									<option value="Sudah Kawin" {{$Penyuluh->status_kawin == 'Sudah Kawin' ? 'selected' : ''}}>Sudah Kawin</option>
				        </select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Pangkat Golongan</label>
							<div class="col-md-10">
								<input type="text" name="pangkat_golongan" class="form-control" value="{{$Penyuluh->pangkat_golongan}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Jabatan</label>
							<div class="col-md-10">
								<input type="text" name="jabatan" class="form-control" value="{{$Penyuluh->jabatan}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Pendidikan Terakhir</label>
							<div class="col-md-10">
								<select name="pendidikan_terakhir" class="form-control input-lg">
									<option value="" selected hidden>Pendidikan Terakhir</option>
									<option value="SD" {{$Penyuluh->pendidikan_terakhir == 'SD' ? 'selected' : ''}}>SD</option>
									<option value="SMP" {{$Penyuluh->pendidikan_terakhir == 'SMP' ? 'selected' : ''}}>SMP</option>
									<option value="SMA" {{$Penyuluh->pendidikan_terakhir == 'SMA' ? 'selected' : ''}}>SMA</option>
									<option value="DI/II" {{$Penyuluh->pendidikan_terakhir == 'DI/DII' ? 'selected' : ''}}>DI/II</option>
									<option value="S1" {{$Penyuluh->pendidikan_terakhir == 'S1' ? 'selected' : ''}}>S1</option>
				        </select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nomor HP</label>
							<div class="col-md-10">
								<input type="text" name="nomor_hp" class="form-control" value="{{$Penyuluh->nomor_hp}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Satuan Kerja</label>
							<div class="col-md-10">
								<select name="satuan_kerja_id" class="form-control input-lg select2">
									<option value="" selected hidden>Pilih</option>
									@foreach ($SatuanKerja as $dataSatuanKerja)
										<option value="{{$dataSatuanKerja->id}}">{{$dataSatuanKerja->nama}}</option>
									@endforeach
				        </select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Unit Kerja</label>
							<div class="col-md-10">
								<select name="unit_kerja_id" class="form-control input-lg select2">
									<option value="" selected hidden>Pilih</option>
									@foreach ($UnitKerja as $dataUnitKerja)
										<option value="{{$dataUnitKerja->id}}">{{$dataUnitKerja->nama}}</option>
									@endforeach
				        </select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Foto</label>
							<div class="col-md-10">
								<input type="file" name="foto" class="form-control">
								<small>*Ukuran Foto 1:1 *Isi hanya jika ganti foto</small>
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
