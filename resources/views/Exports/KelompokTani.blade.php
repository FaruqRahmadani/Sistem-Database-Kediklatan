<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Nama</th>
      <th>Ketua Kelompok</th>
      <th>Penyuluh</th>
      <th>Nomor Telepon</th>
      <th>Alamat</th>
      <th>Kabupaten/Kota</th>
      <th>Komoditas</th>
      <th>Pelatihan</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($KelompokTani as $DataKelompokTani)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$DataKelompokTani->nama}}</td>
        <td>{{$DataKelompokTani->nama_ketua}}</td>
        <td>{{$DataKelompokTani->Penyuluh->nama}}</td>
        <td>{{$DataKelompokTani->nomor_hp}}</td>
        <td>{{$DataKelompokTani->alamat}}</td>
        <td>{{$DataKelompokTani->Kota->nama}}</td>
        <td>
          @foreach ($DataKelompokTani->Komoditas as $Komoditas)
            {{$loop->iteration}}. {{$Komoditas->nama}}
            @unless ($loop->last)<br>@endunless
          @endforeach
        </td>
        <td>
          @foreach ($DataKelompokTani->Pelatihan as $pelatihan)
            {{$loop->iteration}}. {{$pelatihan->nama}}
            @unless ($loop->last)<br>@endunless
          @endforeach
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
