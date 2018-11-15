@extends('Layouts.Master')
@section('content')
  <div class="row row-header">
    <div class="col-lg-12">
      <h3 class="page-header">Detail P4S</h3>
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
          <a href="{{Route('cetakP4sDetail', ['id' => $p4s->UUID])}}" class="btn btn-info btn-sm" target="_blank">
				    <span class="fa fa-print img-circle text-default"></span>
				    Cetak
				  </a>
        </div>
        <div class="panel-body">
          <dl class="col-lg-9 col-sm-12">
            <legend>Data P4S</legend>
            <dl>
              <dt class="col-sm-3 col-lg-4">Nama</dt>
              <dd class="col-sm-9 col-lg-8">{{$p4s->nama}}</dd>
            </dl>
            <dl>
              <dt class="col-sm-3 col-lg-4">Ketua Kelompok</dt>
              <dd class="col-sm-9 col-lg-8">{{$p4s->nama_ketua}}</dd>
            </dl>
            <dl>
              <dt class="col-sm-3 col-lg-4">No Handphone</dt>
              <dd class="col-sm-9 col-lg-8">{{$p4s->nomor_hp}}</dd>
            </dl>
            <dl>
              <dt class="col-sm-3 col-lg-4">Alamat</dt>
              <dd class="col-sm-9 col-lg-8">{{$p4s->alamat}}</dd>
            </dl>
            <dl>
              <dt class="col-sm-3 col-lg-4">Kota/Kabupaten</dt>
              <dd class="col-sm-9 col-lg-8">{{$p4s->Kota->nama}}</dd>
            </dl>
          </dl>
          <dl class="col-lg-3 visible-lg visible-xl">
            <legend class="text-center">Foto Ketua</legend>
            <img src="{{asset($p4s->foto)}}" class="w-100">
          </dl>
          <dl class="col-sm-12">
            <legend>Pelatihan</legend>
            @foreach ($p4s->Pelatihan as $Pelatihan)
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
