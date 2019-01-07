<?php

namespace App\Imports;

use App\Penyuluh;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PenyuluhsImport implements ToModel, WithHeadingRow
{
  /**
  * @param array $row
  *
  * @return \Illuminate\Database\Eloquent\Model|null
  */
  public function model(array $row){
    return new Penyuluh([
      'nip' => $row['nip'],
      'nama' => $row['nama'],
      'pangkat_golongan' => $row['pangkat_golongan'],
      'jabatan' => $row['jabatan'],
      'user_id' => 0
    ]);
  }

  public function headingRow(): int{
    return 1;
  }
}
