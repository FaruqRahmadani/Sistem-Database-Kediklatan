@extends('Layouts.Master')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<button-kembali
					url = {{ Route('Data-Kota-Komoditas') }}
					></button-kembali>
				</div>
				<div class="panel-body">
					<form class="form-horizontal row-border" action="{{ Route('submit-Tambah-Kota-Komoditas') }}" method="POST">
						{{csrf_field()}}
						<field-daerah-provkota
							api = {{Auth::User()->api_token}}
						></field-daerah-provkota>
						<div class="form-group">
							<label class="col-md-2 control-label">Komoditas</label>
							<div class="col-md-10">
								<select id="select2" name="komoditas_id[]" class="form-control input-lg" multiple required>
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
