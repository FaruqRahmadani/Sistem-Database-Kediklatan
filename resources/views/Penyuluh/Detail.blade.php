@extends('Layouts.Master')
@section('content')
  <div class="row row-header">
    <div class="col-lg-12">
      <h3 class="page-header">Detail Penyuluh</h3>
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
          <a href="{{Route('cetakPenyuluhDetail', ['id' => $Penyuluh->UUID])}}" class="btn btn-info btn-sm" target="_blank">
				    <span class="fa fa-print img-circle text-default"></span>
				    Cetak
				  </a>
        </div>
        <div class="panel-body">
          <dl class="col-lg-9 col-sm-12">
            <legend>Data Penyuluh</legend>
            <dl>
              <dt class="col-sm-3 col-lg-4">NIK/NIP</dt>
              <dd class="col-sm-9 col-lg-8">{{$Penyuluh->nip}}</dd>
            </dl>
            <dl>
              <dt class="col-sm-3 col-lg-4">Nama</dt>
              <dd class="col-sm-9 col-lg-8">{{$Penyuluh->nama}}</dd>
            </dl>
            <dl>
              <dt class="col-sm-3 col-lg-4">Tempat, Tanggal Lahir</dt>
              <dd class="col-sm-9 col-lg-8">{{$Penyuluh->TTL}}</dd>
            </dl>
            <dl>
              <dt class="col-sm-3 col-lg-4">Agama</dt>
              <dd class="col-sm-9 col-lg-8">{{$Penyuluh->agama}}</dd>
            </dl>
            <dl>
              <dt class="col-sm-3 col-lg-4">Jenis Kelamin</dt>
              <dd class="col-sm-9 col-lg-8">{{$Penyuluh->jenis_kelamin}}</dd>
            </dl>
            <dl>
              <dt class="col-sm-3 col-lg-4">Status Kawin</dt>
              <dd class="col-sm-9 col-lg-8">{{$Penyuluh->status_kawin}}</dd>
            </dl>
            <dl>
              <dt class="col-sm-3 col-lg-4">Satuan Kerja</dt>
              <dd class="col-sm-9 col-lg-8">{{$Penyuluh->SatuanKerja->nama}}</dd>
            </dl>
            <dl>
              <dt class="col-sm-3 col-lg-4">Unit Kerja</dt>
              <dd class="col-sm-9 col-lg-8">{{$Penyuluh->UnitKerja->nama}}</dd>
            </dl>
            <dl>
              <dt class="col-sm-3 col-lg-4">Pangkat/Jabatan</dt>
              <dd class="col-sm-9 col-lg-8">{{$Penyuluh->PangkatJabatan}}</dd>
            </dl>
            <dl>
              <dt class="col-sm-3 col-lg-4">Pendidikan Terakhir</dt>
              <dd class="col-sm-9 col-lg-8">{{$Penyuluh->pendidikan_terakhir}}</dd>
            </dl>
            <dl>
              <dt class="col-sm-3 col-lg-4">No Handphone</dt>
              <dd class="col-sm-9 col-lg-8">{{$Penyuluh->nomor_hp}}</dd>
            </dl>
          </dl>
          <dl class="col-lg-3 visible-lg visible-xl">
            <legend class="text-center">FOTO</legend>
            <img src="{{asset($Penyuluh->foto)}}" class="w-100">
          </dl>
          <dl class="col-sm-12">
            <legend>Pelatihan</legend>
            @foreach ($Penyuluh->Pelatihan as $Pelatihan)
              <dl>
                <dd class="col-sm-12"><b>{{$loop->iteration}}.</b> {{$Pelatihan->nama}}</dd>
              </dl>
            @endforeach
          </dl>
        </div>
      </div>
    </div>
  </div>
@endsection
