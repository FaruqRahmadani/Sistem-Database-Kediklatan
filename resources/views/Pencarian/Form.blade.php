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
                  <form class="form-horizontal row-border" action="{{Route('penyuluhData')}}" method="GET">
                    @csrf
                    <div class="form-group">
        							<label class="col-md-2 control-label">Satuan Kerja</label>
                      <div class="col-md-10">
        								<select class="form-control input-lg" name="satuanKerja" required>
        									<option value="semua">Semua</option>
                          @foreach ($SatuanKerja as $DataSatuanKerja)
                            <option value="{{$DataSatuanKerja->id}}">{{$DataSatuanKerja->nama}}</option>
                          @endforeach
        								</select>
        							</div>
        						</div>
                    <div class="form-group">
        							<label class="col-md-2 control-label">Unit Kerja</label>
                      <div class="col-md-10">
        								<select class="form-control input-lg" name="unitKerja" required>
        									<option value="semua">Semua</option>
                          @foreach ($UnitKerja as $DataUnitKerja)
                            <option value="{{$DataUnitKerja->id}}">{{$DataUnitKerja->nama}}</option>
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
                <div class="tab-pane fade" id="kelompokTani">
                  <h4>Pencarian Kelompok Tani</h4>
                  <form class="form-horizontal row-border" action="{{Route('kelompokTaniTambahSubmit')}}" method="POST">
                    @csrf
                    <field-daerah-provkota
        							api = {{Auth::User()->api_token}}
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
        </div>
      </div>
    </div>
  </div>
@endsection
