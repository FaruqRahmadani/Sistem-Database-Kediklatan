<?php
Route::GET('logout', 'Auth\LoginController@logout')->name('logout');
Route::GET('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::POST('login', 'Auth\LoginController@login');


Route::group(['middleware' => ['UserMiddleware']], function () {
  Route::GET('', 'UserController@Dashboard')->Name('Dashboard');

  Route::prefix('satuankerja')->group(function () {
    Route::GET('', 'SatuanKerjaController@Data')->Name('Data-Satuan-Kerja');
    Route::GET('tambah', 'SatuanKerjaController@Tambah')->Name('Tambah-Data-Satuan-Kerja');
    Route::POST('tambah', 'SatuanKerjaController@submitTambah')->Name('submit-Tambah-Data-Satuan-Kerja');
    Route::GET('edit/{id}', 'SatuanKerjaController@Edit')->Name('Edit-Data-Satuan-Kerja');
    Route::POST('edit/{id}', 'SatuanKerjaController@submitEdit')->Name('submit-Edit-Data-Satuan-Kerja');
    Route::GET('delete/{id}', 'SatuanKerjaController@Delete')->Name('Delete-Data-Satuan-Kerja');
  });

  Route::prefix('unitkerja')->group(function () {
    Route::GET('', 'UnitKerjaController@Data')->Name('Data-Unit-Kerja');
    Route::GET('tambah', 'UnitKerjaController@Tambah')->Name('Tambah-Data-Unit-Kerja');
    Route::POST('tambah', 'UnitKerjaController@submitTambah')->Name('submit-Tambah-Data-Unit-Kerja');
    Route::GET('edit/{id}', 'UnitKerjaController@Edit')->Name('Edit-Data-Unit-Kerja');
    Route::POST('edit/{id}', 'UnitKerjaController@submitEdit')->Name('submit-Edit-Data-Unit-Kerja');
    Route::GET('delete/{id}', 'UnitKerjaController@Delete')->Name('Delete-Data-Unit-Kerja');
  });

  Route::prefix('penyuluh')->group(function () {
    Route::GET('', 'PenyuluhController@Data')->Name('Data-Penyuluh');
    Route::GET('tambah', 'PenyuluhController@Tambah')->Name('Tambah-Data-Penyuluh');
    Route::POST('tambah', 'PenyuluhController@submitTambah')->Name('submit-Tambah-Data-Penyuluh');
    Route::GET('edit/{id}', 'PenyuluhController@Edit')->Name('Edit-Data-Penyuluh');
    Route::POST('edit/{id}', 'PenyuluhController@submitEdit')->Name('submit-Edit-Data-Penyuluh');
    Route::GET('delete/{id}', 'PenyuluhController@Delete')->Name('Delete-Data-Penyuluh');
  });

  Route::prefix('cetak')->group(function () {
    Route::GET('satuankerja', 'CetakController@SatuanKerja')->name('Cetak-Satuan-Kerja');
    Route::GET('unitkerja', 'CetakController@UnitKerja')->name('Cetak-Unit-Kerja');
    Route::GET('penyuluh', 'CetakController@Penyuluh')->name('Cetak-Penyuluh');
  });
});
