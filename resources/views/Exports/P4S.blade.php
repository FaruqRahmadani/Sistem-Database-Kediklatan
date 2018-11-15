<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Nama</th>
      <th>Ketua Kelompok</th>
      <th>Nomor Telepon</th>
      <th>Alamat</th>
      <th>Kota/Kabupaten</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($P4S as $dataP4S)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$dataP4S->nama}}</td>
        <td>{{$dataP4S->nama_ketua}}</td>
        <td>{{$dataP4S->nomor_hp}}</td>
        <td>{{$dataP4S->alamat}}</td>
        <td>{{$dataP4S->Kota->nama}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
