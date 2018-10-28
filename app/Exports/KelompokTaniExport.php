<?php

namespace App\Exports;

use App\KelompokTani;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class KelompokTaniExport implements FromView
{
  public function view(): View
  {
    return view('Exports.KelompokTani', [
      'KelompokTani' => KelompokTani::all()
    ]);
  }
}
