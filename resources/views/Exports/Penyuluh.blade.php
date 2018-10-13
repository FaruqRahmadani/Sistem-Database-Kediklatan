<table>
  <thead>
    <tr>
      <th>#</th>
      <th>NIP</th>
      <th>Nama</th>
      <th>Tempat/Tanggal Lahir</th>
      <th>Agama</th>
      <th>Jenis Kelamin</th>
      <th>Pangkat/Jabatan</th>
      <th>Pendidikan Terakhir</th>
      <th>Nomor HP</th>
      <th>Satuan Kerja</th>
      <th>Unit Kerja</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($Penyuluh as $Index=>$DataPenyuluh)
      <tr>
        <td>{{$Index+1}}</td>
        <td>{{$DataPenyuluh->nip}}</td>
        <td>{{$DataPenyuluh->nama}}</td>
        <td>{{$DataPenyuluh->TTL}}</td>
        <td>{{$DataPenyuluh->agama}}</td>
        <td>{{$DataPenyuluh->jenis_kelamin}}</td>
        <td>{{$DataPenyuluh->PangkatJabatan}}</td>
        <td>{{$DataPenyuluh->pendidikan_terakhir}}</td>
        <td>{{$DataPenyuluh->nomor_hp}}</td>
        <td>{{$DataPenyuluh->SatuanKerja->nama}}</td>
        <td>{{$DataPenyuluh->UnitKerja->nama}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
