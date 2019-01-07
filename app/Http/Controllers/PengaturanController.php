<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaturan;
use File;

class PengaturanController extends Controller
{
  public function form(){
    $pengaturan = Pengaturan::first();
    return view('pengaturan.form', compact('pengaturan'));
  }

  public function submit(Request $request){
    $pengaturan = Pengaturan::count()? Pengaturan::first() : new Pengaturan;
    if ($request->image_landing){
      $FotoExt = $request->image_landing->getClientOriginalExtension();
      $Foto = "imagelanding.{$FotoExt}";
      if (Pengaturan::count()) File::delete($pengaturan->image_landing);
      $pengaturan->image_landing = $request->image_landing->move('img/pengaturan', $Foto);
    }
    $pengaturan->kontak = $request->kontak;
    $pengaturan->save();
    return redirect()->Route('pengaturanForm')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil Disimpan']);
  }
}
