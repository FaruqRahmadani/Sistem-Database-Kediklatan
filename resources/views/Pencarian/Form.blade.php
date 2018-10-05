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
                <li class="{{isset($Penyuluh) || empty($KelompokTani)? 'active':''}}"><a href="#Penyuluh" data-toggle="tab" aria-expanded="true">Penyuluh</a></li>
                <li class="{{isset($KelompokTani)? 'active':''}}"><a href="#kelompokTani" data-toggle="tab" aria-expanded="false">Kelompok Tani</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade {{isset($Penyuluh) || empty($KelompokTani)? 'active in':''}}" id="Penyuluh">
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
                  @isset($Penyuluh)
                    <hr>
                    <table id="myTable" class="table table-hover table-custom">
          						<thead>
          							<tr>
          								<th>#</th>
                          <th></th>
          								<th>Nama</th>
          								<th>Tempat/Tanggal Lahir</th>
          								<th>Agama</th>
          								<th>Jenis Kelamin</th>
          								<th>Pangkat/Jabatan</th>
          								<th>Pendidikan Terakhir</th>
          								<th>Nomor HP</th>
          								<th>Satuan Kerja</th>
          								<th>Unit Kerja</th>
          							</tr>
          						</thead>
          						<tbody>
          							@foreach ($Penyuluh as $Index=>$DataPenyuluh)
          								<tr>
          									<td>{{$Index+1}}</td>
                            <td align="center">
          										<img src="{{asset($DataPenyuluh->foto)}}" alt="{{$DataPenyuluh->nama}}" class="img-circle img img-45 img-thumbnail">
          									</td>
          									<td>{!!$DataPenyuluh->NIPNama!!}</td>
          									<td>{{$DataPenyuluh->TTL}}</td>
          									<td>{{$DataPenyuluh->agama}}</td>
          									<td>{{$DataPenyuluh->jenis_kelamin}}</td>
          									<td>{{$DataPenyuluh->PangkatJabatan}}</td>
          									<td>{{$DataPenyuluh->pendidikan_terakhir}}</td>
          									<td>{{$DataPenyuluh->nomor_hp}}</td>
          									<td>{{$DataPenyuluh->SatuanKerja->nama}}</td>
          									<td>{{$DataPenyuluh->UnitKerja->nama}}</td>
          								</tr>
          							@endforeach
          						</tbody>
          					</table>
                  @endisset
                </div>
                <div class="tab-pane fade {{isset($KelompokTani)? 'active in':''}}" id="kelompokTani">
                  <h4>Pencarian Kelompok Tani</h4>
                  <form class="form-horizontal row-border" action="{{Route('pencarianKelTani')}}" method="POST">
                    @csrf
                    <field-daerah-provkota
        							api = {{Auth::User()->api_token}}
                      required = disable
                      {{isset($Selected)? "kota = $Selected->kota_id":''}}
        						></field-daerah-provkota>
                    <div class="form-group">
                      <label class="col-md-2 control-label">Komoditas</label>
                      <div class="col-md-10">
                        <select id='select2' name="komoditas_id[]" class="form-control input-lg" multiple>
                          @foreach ($Komoditas as $DataKomoditas)
                            <option value="{{$DataKomoditas->id}}" {{isset($Selected) && collect($Selected->komoditas_id)->search($DataKomoditas->id) !== false ? 'selected' : ''}}>{{$DataKomoditas->nama}}</option>
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
                  @isset($KelompokTani)
                    <table id="myTable" class="table table-hover table-custom">
          						<thead>
          							<tr>
          								<th>#</th>
          								<th>Nama</th>
          								<th>Nama Ketua</th>
          								<th>Penyuluh</th>
          								<th>Nomor HP</th>
          								<th>Alamat</th>
          								<th>Kabupaten/Kota</th>
          								<th>Komoditas</th>
          							</tr>
          						</thead>
          						<tbody>
          							@foreach ($KelompokTani as $Index=>$DataKelompokTani)
          								<tr>
          									<td>{{$Index+1}}</td>
          									<td>{{$DataKelompokTani->nama}}</td>
                            <td class="text-center">
          										<img src="{{asset($DataKelompokTani->foto)}}" alt="{{$DataKelompokTani->nama}}" class="img-circle img img-45 img-thumbnail">
          										<br>
          										<span class="nowrap">
          											{{$DataKelompokTani->nama_ketua}}
          										</span>
          									</td>
          									<td>{{$DataKelompokTani->Penyuluh->nama}}</td>
          									<td>{{$DataKelompokTani->nomor_hp}}</td>
          									<td>{{$DataKelompokTani->alamat}}</td>
          									<td>{{$DataKelompokTani->Kota->nama}}</td>
          									<td class="text-center">
          										@foreach ($DataKelompokTani->Komoditas as $Komoditas)
          											<span class="btn-primary btn-xs span-list">
          										    {{$Komoditas->nama}}
          										  </span>
          										@endforeach
          									</td>
          								</tr>
          							@endforeach
          						</tbody>
          					</table>
                  @endisset
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
