<?php

namespace App\Exports;

use App\Penyuluh;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PenyuluhExport implements FromView
{
  public function view(): View
  {
    return view('Exports.Penyuluh', [
      'Penyuluh' => Penyuluh::all()
    ]);
  }
}
