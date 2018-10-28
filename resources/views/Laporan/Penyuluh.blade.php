<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  .table{
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  .table > * > * > *{
    border: 1px solid #000000;
    padding: 8px;
  }
  .text-center{
    text-align: center;
  }
  th{
    text-align: center;
  }
  </style>
  <title>HEADER DATABASE PENYULUH</title>
</head>
<body>
  <header>
    <div class="text-center">
      <h1>HEADER DATABASE PENYULUH</h1>
    </div>
    <hr style="margin-bottom: 15px">
  </header>
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Tempat / Tanggal Lahir</th>
        <th>Agama</th>
        <th>Jenis Kelamin</th>
        <th>Pangkat / Jabatan</th>
        <th>Pendidikan Terakhir</th>
        <th>Nomor HP</th>
        <th>Satuan Kerja</th>
        <th>Unit Kerja</th>
        <th>Pelatihan</th>
        <th>Pas Photo</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($Penyuluh as $DataPenyuluh)
        <tr>
          <td class="text-center">{{$loop->iteration}}</td>
          <td>
            ({{$DataPenyuluh->nip}})<br>
            {{$DataPenyuluh->nama}}
          </td>
          <td>{{$DataPenyuluh->TTL}}</td>
          <td>{{$DataPenyuluh->agama}}</td>
          <td>{{$DataPenyuluh->jenis_kelamin}}</td>
          <td>{{$DataPenyuluh->pangkat_golongan}} / {{$DataPenyuluh->jabatan}}</td>
          <td>{{$DataPenyuluh->pendidikan_terakhir}}</td>
          <td>{{$DataPenyuluh->nomor_hp}}</td>
          <td>{{$DataPenyuluh->SatuanKerja->nama}}</td>
          <td>{{$DataPenyuluh->UnitKerja->nama}}</td>
          <td>
            @foreach ($DataPenyuluh->Pelatihan as $Pelatihan)
              {{$loop->iteration}}. {{$Pelatihan->nama}}
              @unless ($loop->last)<br>@endunless
              @endforeach
            </td>
            <td class="text-center">
              <img src="{{$DataPenyuluh->foto}}" style="max-height: 150px">
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </body>
  </html>
