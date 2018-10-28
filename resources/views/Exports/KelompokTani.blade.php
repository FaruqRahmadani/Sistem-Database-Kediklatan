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
    </tr>
  </thead>
  <tbody>
    @foreach ($KelompokTani as $DataKelompokTani)
      <tr>
        <td valign="middle">
          {{$loop->iteration}}
        </td>
        <td valign="middle">
          {{$DataKelompokTani->nama}}
        </td>
        <td valign="middle">
          {{$DataKelompokTani->nama_ketua}}
        </td>
        <td valign="middle">
          {{$DataKelompokTani->Penyuluh->nama}}
        </td>
        <td valign="middle">
          {{$DataKelompokTani->nomor_hp}}
        </td>
        <td valign="middle">
          {{$DataKelompokTani->alamat}}
        </td>
        <td valign="middle">
          {{$DataKelompokTani->Kota->nama}}
        </td>
        <td valign="middle">
          @foreach ($DataKelompokTani->Komoditas as $Komoditas)
            {{$Komoditas->nama}}
            @unless ($loop->last)<br>@endunless
          @endforeach
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
