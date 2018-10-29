<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  .text-center{
    text-align: center;
  }
  .nowrap{
    white-space: nowrap;
  }
  .width-20{
    width:20%;
  }
  .width-100{
    width:100%;
  }
  .isi > * > * > td:first-child{
    width:25%;
    padding: 0.5em 0;
  }
  .isi > * > * > td:last-child{
    width:75%;
    padding: 0.5em 0;
  }
  .legend{
    padding: 1em 0;
  }
  </style>
  <title>HEADER DATABASE PENYULUH</title>
</head>
<body>
  <header>
    <table class="width-100">
      <th class="width-20 text-center">
        <img src="img/bbpp-logo.png" style="width:85px">
      </th>
      <th class="text-center" valign="middle">
        <h2>
          DATABASE<br>
          P4S
        </h2>
      </th>
      <th class="width-20 text-center">
        <img src="{{$p4s->foto}}" style="width:85px">
      </th>
    </table>
    <hr style="margin-bottom: 15px">
    <table class="isi width-100">
      <tbody>
        <tr class="legend">
          <td colspan="2"><strong>Data P4S</strong></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>{{$p4s->nama}}</td>
        </tr>
        <tr>
          <td>Ketua Kelompok</td>
          <td>{{$p4s->nama_ketua}}</td>
        </tr>
        <tr>
          <td>No Handphone</td>
          <td>{{$p4s->nomor_hp}}</td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>{{$p4s->alamat}}</td>
        </tr>
        <tr>
          <td>Kota/Kabupaten</td>
          <td>{{$p4s->Kota->nama}}</td>
        </tr>
        <tr class="legend">
          <td colspan="2"><strong>Data Pelatihan</strong></td>
        </tr>
        @foreach ($p4s->Pelatihan as $Pelatihan)
          <tr>
            <td>{{$loop->iteration}}. {{$Pelatihan->nama}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </header>

  </body>
  </html>
