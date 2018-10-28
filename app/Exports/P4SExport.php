<?php

namespace App\Exports;

use App\P4S;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class P4SExport implements FromView
{
  public function view(): View
  {
    return view('Exports.P4S', [
      'P4S' => P4S::all()
    ]);
  }
}
