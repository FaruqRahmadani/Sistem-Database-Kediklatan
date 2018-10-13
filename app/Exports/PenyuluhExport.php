<?php

namespace App\Exports;

use App\Penyuluh;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromCollection;

class PenyuluhExport implements FromView
{
  /**
  * @return \Illuminate\Support\Collection
  */

  // private $fileName = 'penyuluh.xlsx';

  // public function collection()
  // {
  //   return Penyuluh::all();
  // }

  public function view(): View
  {
    return view('Exports.Penyuluh', [
      'Penyuluh' => Penyuluh::all()
    ]);
  }
}
