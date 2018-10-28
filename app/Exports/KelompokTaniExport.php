<?php

namespace App\Exports;

use App\KelompokTani;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromCollection;

class KelompokTaniExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return KelompokTani::all();
    // }

    public function view(): View
    {
      return view('Exports.KelompokTani', [
        'KelompokTani' => KelompokTani::all()
      ]);
    }
}
