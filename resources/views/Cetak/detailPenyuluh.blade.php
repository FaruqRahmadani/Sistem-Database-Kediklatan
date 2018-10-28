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
          PENYULUH
        </h2>
      </th>
      <th class="width-20 text-center">
        <img src="{{$Penyuluh->foto}}" style="width:85px">
      </th>
    </table>
    <hr style="margin-bottom: 15px">
    <table class="isi width-100">
      <tbody>
        <tr class="legend">
          <td colspan="2"><strong>Data Penyuluh</strong></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>{{$Penyuluh->nama}}</td>
        </tr>
        <tr>
          <td>Tempat, Tanggal Lahir</td>
          <td>{{$Penyuluh->TTL}}</td>
        </tr>
        <tr>
          <td>Agama</td>
          <td>{{$Penyuluh->agama}}</td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>{{$Penyuluh->jenis_kelamin}}</td>
        </tr>
        <tr>
          <td>Status Kawin</td>
          <td>{{$Penyuluh->status_kawin}}</td>
        </tr>
        <tr>
          <td>Satuan Kerja</td>
          <td>{{$Penyuluh->SatuanKerja->nama}}</td>
        </tr>
        <tr>
          <td>Unit Kerja</td>
          <td>{{$Penyuluh->UnitKerja->nama}}</td>
        </tr>
        <tr>
          <td>Pangkat/Jabatan</td>
          <td>{{$Penyuluh->PangkatJabatan}}</td>
        </tr>
        <tr>
          <td>Pendidikan Terakhir</td>
          <td>{{$Penyuluh->pendidikan_terakhir}}</td>
        </tr>
        <tr>
          <td>No Handphone</td>
          <td>{{$Penyuluh->nomor_hp}}</td>
        </tr>
        <tr class="legend">
          <td colspan="2"><strong>Data Pelatihan</strong></td>
        </tr>
        @foreach ($Penyuluh->Pelatihan as $Pelatihan)
          <tr>
            <td>{{$loop->iteration}}. {{$Pelatihan->nama}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </header>

  </body>
  </html>
