@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Edit Penyuluh</h3>
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
					<form class="form-horizontal row-border" action="{{Route('penyuluhEditSubmit', ['id' => $Penyuluh->UUID])}}" method="POST" enctype="multipart/form-data">
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
									@foreach (HData::agama() as $value)
										<option value="{{$value}}" @if ($Penyuluh->agama == $value) selected @endif>{{$value}}</option>
									@endforeach
				        </select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Jenis Kelamin</label>
							<div class="col-md-10">
								<select name="jenis_kelamin" class="form-control input-lg">
									<option value="" selected hidden>Jenis Kelamin</option>
									@foreach (HData::jenisKelamin() as $value)
										<option value="{{$value}}" @if ($Penyuluh->jenis_kelamin == $value) selected @endif>{{$value}}</option>
									@endforeach
				        </select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Status Kawin</label>
							<div class="col-md-10">
								<select name="status_kawin" class="form-control input-lg">
									<option value="" selected hidden>Status Kawin</option>
									@foreach (HData::statusKawin() as $value)
										<option value="{{$value}}" @if ($Penyuluh->status_kawin == $value) selected @endif>{{$value}}</option>
									@endforeach
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
									@foreach (HData::pendidikanTerakhir() as $value)
										<option value="{{$value}}" @if ($Penyuluh->pendidikan_terakhir == $value) selected @endif>{{$value}}</option>
									@endforeach
				        </select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nomor HP</label>
							<div class="col-md-10">
								<input type="text" name="nomor_hp" class="form-control" value="{{$Penyuluh->nomor_hp}}">
							</div>
						</div>
						<field-satkerja
							api = {{Auth::User()->api_token}}
							SatKerja = {{$Penyuluh->satuan_kerja_id}}
						></field-satkerja>
						<field-unitkerja
							api = {{Auth::User()->api_token}}
							UnitKerja = {{$Penyuluh->unit_kerja_id}}
						></field-unitkerja>
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
