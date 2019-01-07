<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaturan;

class PengaturanController extends Controller
{
  public function form(){
    $pengaturan = Pengaturan::first();
    return view('pengaturan.Form', compact('pengaturan'));
  }

  public function submit(Request $request){
    $pengaturan = Pengaturan::count()? Pengaturan::first() : new Pengaturan;
    if ($request->image_landing){
      $FotoExt = $request->image_landing->getClientOriginalExtension();
      $Foto = "imagelanding.{$FotoExt}";
      $pengaturan->image_landing = $request->image_landing->move('img/pengaturan', $Foto);
    }
    $pengaturan->kontak = $request->kontak;
    $pengaturan->save();
    return redirect()->Route('pengaturanForm')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil Disimpan']);
  }
}
