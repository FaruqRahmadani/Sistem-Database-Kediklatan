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
  .nowrap{
    white-space: nowrap;
  }
  th{
    text-align: center;
  }
  </style>
  <title>HEADER DATABASE KELOMPOK TANI</title>
</head>
<body>
  <header>
    <div class="text-center">
      <h1>HEADER DATABASE P4S</h1>
    </div>
    <hr style="margin-bottom: 15px">
  </header>
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Ketua Kelompok</th>
        <th>Nomor Telepon</th>
        <th>Alamat</th>
        <th>Kota/Kabupaten</th>
        <th>Pelatihan</th>
        <th>Foto Ketua Kelompok</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($p4s as $dataP4s)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$dataP4s->nama}}</td>
          <td>{{$dataP4s->nama_ketua}}</td>
          <td>{{$dataP4s->nomor_hp}}</td>
          <td>{{$dataP4s->alamat}}</td>
          <td>{{$dataP4s->Kota->nama}}</td>
          <td>
            @foreach ($dataP4s->pelatihan as $Pelatihan)
              {{$Pelatihan->nama}}
              @unless ($loop->last)<br>@endunless
            @endforeach
          </td>
          <td class="text-center">
            <img src="{{$dataP4s->foto}}" style="max-height: 100px">
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
