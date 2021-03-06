@extends('Layouts.Master')
@section('content')
	<div class="row row-header">
		<div class="col-lg-12">
			<h3 class="page-header">Tambah P4S</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="{{Route('p4sData')}}" class="btn btn-primary btn-sm">
						<span class="fa fa-reply img-circle text-default"></span>
						Kembali
					</a>
				</div>
				<div class="panel-body">
					<form class="form-horizontal row-border" action="{{Route('p4sTambahSubmit')}}" method="POST" enctype="multipart/form-data">
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
							<label class="col-md-2 control-label">Nama Ketua Kelompok</label>
							<div class="col-md-10">
								<input type="text" name="nama_ketua" value="{{old('nama_ketua')}}" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Foto Ketua Kelompok</label>
							<div class="col-md-10">
								<input type="file" name="foto" class="form-control">
								<small>*Ukuran Foto 1:1</small>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nomor HP</label>
							<div class="col-md-10">
								<input type="text" name="nomor_hp" value="{{old('nomor_hp')}}" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Alamat</label>
							<div class="col-md-10">
								<input type="text" name="alamat" value="{{old('alamat')}}" class="form-control">
							</div>
						</div>
						<div class="form-group">
				      <label class="col-md-2 control-label">Kota</label>
				      <div class="col-md-10">
				        <select name="kota_id" class="form-control input-lg">
									<option value="">Kota</option>
									@foreach ($Kota as $DataKota)
										<option value="{{$DataKota->id}}" @if($DataKota->id == old('kota_id')) selected @endif>{{$DataKota->nama}}</option>
									@endforeach
				        </select>
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
