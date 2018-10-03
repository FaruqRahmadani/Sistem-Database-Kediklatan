@extends('Layouts.Master')
@section('content')
  <div class="row row-header">
    <div class="col-lg-12">
      <h3 class="page-header">Form Pencarian Data</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="panel panel-default">
            <div class="panel-body tabs">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#Penyuluh" data-toggle="tab" aria-expanded="true">Penyuluh</a></li>
                <li class=""><a href="#kelompokTani" data-toggle="tab" aria-expanded="false">Kelompok Tani</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade active in" id="Penyuluh">
                  <h4>Pencarian Data Penyuluh</h4>
                  <form class="form-horizontal row-border" action="{{Route('pencarianPenyuluh')}}" method="POST">
                    @csrf
                    <div class="form-group">
        							<label class="col-md-2 control-label">Satuan Kerja</label>
                      <div class="col-md-10">
        								<select class="form-control input-lg" name="satuanKerja">
        									<option value="">Semua</option>
                          @foreach ($SatuanKerja as $DataSatuanKerja)
                            <option value="{{$DataSatuanKerja->id}}" {{isset($Selected) && $Selected->satuanKerja == $DataSatuanKerja->id? 'selected':''}}>{{$DataSatuanKerja->nama}}</option>
                          @endforeach
        								</select>
        							</div>
        						</div>
                    <div class="form-group">
        							<label class="col-md-2 control-label">Unit Kerja</label>
                      <div class="col-md-10">
        								<select class="form-control input-lg" name="unitKerja">
        									<option value=>Semua</option>
                          @foreach ($UnitKerja as $DataUnitKerja)
                            <option value="{{$DataUnitKerja->id}}" {{isset($Selected) && $Selected->unitKerja == $DataUnitKerja->id? 'selected':''}}>{{$DataUnitKerja->nama}}</option>
                          @endforeach
        								</select>
        							</div>
        						</div>
                    <div class="row">
        							<div class="text-center">
        								<div class="col-md-12">
        									<button type="submit" class="btn btn-info btn-fill">Pencarian</button>
        								</div>
        							</div>
        						</div>
                  </form>
                </div>
                <div class="tab-pane fade" id="kelompokTani">
                  <h4>Pencarian Kelompok Tani</h4>
                  <form class="form-horizontal row-border" action="{{Route('kelompokTaniDataFilter')}}" method="POST">
                    @csrf
                    <field-daerah-provkota
        							api = {{Auth::User()->api_token}}
                      required = disable
        						></field-daerah-provkota>
                    <div class="form-group">
                      <label class="col-md-2 control-label">Komoditas</label>
                      <div class="col-md-10">
                        <select id='select2' name="komoditas_id[]" class="form-control input-lg" multiple>
                          @foreach ($Komoditas as $DataKomoditas)
                            <option value="{{$DataKomoditas->id}}">{{$DataKomoditas->nama}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="row">
        							<div class="text-center">
        								<div class="col-md-12">
        									<button type="submit" class="btn btn-info btn-fill">Pencarian</button>
        								</div>
        							</div>
        						</div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @isset ($Penyuluh)
    <div class="row">
  		<div class="col-md-12">
  			<div class="panel panel-default">
  				<div class="panel-body">
  					<table id="myTable" class="table table-hover table-custom">
  						<thead>
  							<tr>
  								<th>#</th>
  								<th>Nama</th>
  								<th>Tempat/Tanggal Lahir</th>
  								<th>Agama</th>
  								<th>Jenis Kelamin</th>
  								<th>Pangkat/Jabatan</th>
  								<th>Pendidikan Terakhir</th>
  								<th>Nomor HP</th>
  								<th>Satuan Kerja</th>
  								<th>Unit Kerja</th>
  								<th>Action</th>
  							</tr>
  						</thead>
  						<tbody>
  							@foreach ($Penyuluh as $Index=>$DataPenyuluh)
  								<tr>
  									<td>{{$Index+1}}</td>
  									<td>{!!$DataPenyuluh->NIPNama!!}</td>
  									<td>{{$DataPenyuluh->TTL}}</td>
  									<td>{{$DataPenyuluh->agama}}</td>
  									<td>{{$DataPenyuluh->jenis_kelamin}}</td>
  									<td>{{$DataPenyuluh->PangkatJabatan}}</td>
  									<td>{{$DataPenyuluh->pendidikan_terakhir}}</td>
  									<td>{{$DataPenyuluh->nomor_hp}}</td>
  									<td>{{$DataPenyuluh->SatuanKerja->nama}}</td>
  									<td>{{$DataPenyuluh->UnitKerja->nama}}</td>
  									<td>
  										<a href="{{Route('penyuluhEditForm', ['id' => $DataPenyuluh->UUID])}}" class="btn btn-info btn-xs">Edit</a>
  										<button data={{$DataPenyuluh->UUID}} href={{Route('penyuluhHapus')}} class="btn btn-warning btn-xs btn-delete">Delete</button>
  									</td>
  								</tr>
  							@endforeach
  						</tbody>
  					</table>
  				</div>
  			</div>
  		</div>
  	</div>
  @endisset
@endsection
