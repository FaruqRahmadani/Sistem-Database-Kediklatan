@extends('Layouts.Master')
@section('content')
  <div class="row row-header">
    <div class="col-lg-12">
      <h3 class="page-header">Detail Kelompok Tani</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <a href="{{Route('kelompokTaniData')}}" class="btn btn-primary btn-sm">
            <span class="fa fa-reply img-circle text-default"></span>
            Kembali
          </a>
          <a href="{{Route('cetakKelompokTaniDetail', ['id' => $KelompokTani->UUID])}}" class="btn btn-info btn-sm" target="_blank">
				    <span class="fa fa-print img-circle text-default"></span>
				    Cetak
				  </a>
        </div>
        <div class="panel-body">
          <dl class="col-lg-9 col-sm-12">
            <legend>Data Penyuluh</legend>
            <dl>
              <dt class="col-sm-3 col-lg-4">Nama</dt>
              <dd class="col-sm-9 col-lg-8">{{$KelompokTani->nama}}</dd>
            </dl>
            <dl>
              <dt class="col-sm-3 col-lg-4">Ketua Kelompok</dt>
              <dd class="col-sm-9 col-lg-8">{{$KelompokTani->nama_ketua}}</dd>
            </dl>
            <dl>
              <dt class="col-sm-3 col-lg-4">Penyuluh</dt>
              <dd class="col-sm-9 col-lg-8">
                ({{$KelompokTani->Penyuluh->nip}}) {{$KelompokTani->Penyuluh->nama}}
              </dd>
            </dl>
            <dl>
              <dt class="col-sm-3 col-lg-4">No Handphone</dt>
              <dd class="col-sm-9 col-lg-8">{{$KelompokTani->nomor_hp}}</dd>
            </dl>
            <dl>
              <dt class="col-sm-3 col-lg-4">Alamat</dt>
              <dd class="col-sm-9 col-lg-8">{{$KelompokTani->alamat}}</dd>
            </dl>
            <dl>
              <dt class="col-sm-3 col-lg-4">Kota/Kabupaten</dt>
              <dd class="col-sm-9 col-lg-8">{{$KelompokTani->Kota->nama}}</dd>
            </dl>
          </dl>
          <dl class="col-lg-3 visible-lg visible-xl">
            <legend class="text-center">Foto Ketua</legend>
            <img src="{{asset($KelompokTani->foto)}}" class="w-100">
          </dl>
          <dl class="col-sm-12">
            <legend>Komoditas</legend>
            @foreach ($KelompokTani->Komoditas as $Komoditas)
              <dl>
                <dd class="col-sm-12"><b>{{$loop->iteration}}.</b> {{$Komoditas->nama}}</dd>
              </dl>
            @endforeach
          </dl>
          <dl class="col-sm-12">
            <legend>Pelatihan</legend>
            @foreach ($KelompokTani->Pelatihan as $Pelatihan)
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
