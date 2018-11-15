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
      <h1>HEADER DATABASE KELOMPOK TANI</h1>
    </div>
    <hr style="margin-bottom: 15px">
  </header>
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Ketua Kelompok</th>
        <th>Penyuluh</th>
        <th>Nomor Telepon</th>
        <th>Alamat</th>
        <th>Kota/Kabupaten</th>
        <th>Komoditas</th>
        <th>Pelatihan</th>
        <th>Foto Ketua Kelompok</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($kelompokTani as $dataKelompokTani)
        <tr>
          <td class="text-center">{{$loop->iteration}}</td>
          <td>{{$dataKelompokTani->nama}}</td>
          <td>{{$dataKelompokTani->nama_ketua}}</td>
          <td>{{$dataKelompokTani->Penyuluh->nama}}</td>
          <td>{{$dataKelompokTani->nomor_hp}}</td>
          <td>{{$dataKelompokTani->alamat}}</td>
          <td>{{$dataKelompokTani->Kota->nama}}</td>
          <td>
            @foreach ($dataKelompokTani->Komoditas as $komoditas)
              {{$loop->iteration}}. {{$komoditas->nama}}
              @unless ($loop->last)<br>@endunless
            @endforeach
          </td>
          <td>
            @foreach ($dataKelompokTani->Pelatihan as $pelatihan)
              {{$loop->iteration}}. {{$pelatihan->nama}}
              @unless ($loop->last)<br>@endunless
            @endforeach
          </td>
          <td class="text-center">
            <img src="{{$dataKelompokTani->foto}}" style="max-height: 100px">
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
