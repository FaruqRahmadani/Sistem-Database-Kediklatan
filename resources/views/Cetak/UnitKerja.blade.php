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
        <th class="text-center" style="width:20px"> No </th>
        <th class="text-center" style="width:150px"> Nama </th>
        <th class="text-center" style="width:200px"> Alamat </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($UnitKerja as $Index => $DataUnitKerja)
        <tr>
          <td class="text-center">{{$Index+=1}}</td>
          <td>{{$DataUnitKerja->nama}}</td>
          <td>{{$DataUnitKerja->alamat}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
