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
  </style>
  <title>Print Data Unit Kerja</title>
</head>
<body>
  <div class="text-center">
    <h1>Laporan Data Unit Kerja</h1>
  </div>
  <hr style="margin-bottom: 15px">
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th class="text-center"> #</th>
        <th class="text-center"> Nama</th>
        <th class="text-center"> Tempat / Tanggal Lahir</th>
        <th class="text-center"> Agama</th>
        <th class="text-center"> Jenis Kelamin</th>
        <th class="text-center"> Pangkat / Jabatan</th>
        <th class="text-center"> Pendidikan Terakhir</th>
        <th class="text-center"> Nomor HP</th>
        <th class="text-center"> Satuan Kerja</th>
        <th class="text-center"> Unit Kerja</th>
        <th class="text-center"> Komoditas Unggulan</th>
        <th class="text-center"> Pelatihan</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($Penyuluh as $Index => $DataPenyuluh)
        <tr>
          <td class="text-center">{{$Index+=1}}</td>
          <td>
            ({{$DataPenyuluh->nip}})<br>
            {{$DataPenyuluh->nama}}
          </td>
          <td>{{$DataPenyuluh->tempat_lahir}}, {{Tanggal::Format($DataPenyuluh->tanggal_lahir)}}</td>
          <td>{{$DataPenyuluh->agama}}</td>
          <td>{{$DataPenyuluh->jenis_kelamin}}</td>
          <td>{{$DataPenyuluh->pangkat_golongan}} / {{$DataPenyuluh->jabatan}}</td>
          <td>{{$DataPenyuluh->pendidikan_terakhir}}</td>
          <td>{{$DataPenyuluh->nomor_hp}}</td>
          <td>{{$DataPenyuluh->SatuanKerja->nama}}</td>
          <td>{{$DataPenyuluh->UnitKerja->nama}}</td>
          <td>{{$DataPenyuluh->komoditas_unggulan}}</td>
          <td>{{$DataPenyuluh->pelatihan}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
