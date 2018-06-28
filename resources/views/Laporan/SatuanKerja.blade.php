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
  <title>Print Data Satuan Kerja</title>
</head>
<body>
  <div class="text-center">
    <h1>Laporan Data Satuan Kerja</h1>
  </div>
  <hr style="margin-bottom: 15px">
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th class="text-center"> No </th>
        <th class="text-center"> Nama </th>
        <th class="text-center"> Alamat </th>
        <th class="text-center"> Provinsi </th>
        <th class="text-center"> Kota </th>
        <th class="text-center"> Nomor Telepon </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($SatKerja as $Index => $DataSatKerja)
        <tr>
          <td class="text-center">{{$Index+=1}}</td>
          <td>{{$DataSatKerja->nama}}</td>
          <td>{{$DataSatKerja->alamat}}</td>
          <td>{{$DataSatKerja->Provinsi->nama_provinsi}}</td>
          <td>{{$DataSatKerja->Kota->nama_kota}}</td>
          <td>{{$DataSatKerja->nomor_telepon}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
