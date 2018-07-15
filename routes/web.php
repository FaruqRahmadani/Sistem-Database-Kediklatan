<?php
Route::GET('logout', 'Auth\LoginController@logout')->name('logout');
Route::GET('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::POST('login', 'Auth\LoginController@login');


Route::group(['middleware' => ['UserMiddleware']], function () {
  Route::GET('', 'DashboardController@Dashboard')->Name('Dashboard');

  Route::prefix('user')->group(function () {
    Route::GET('', 'UserController@Data')->Name('Data-User');
    Route::GET('tambah', 'UserController@Tambah')->Name('Tambah-User');
    Route::POST('tambah', 'UserController@submitTambah')->Name('submit-Tambah-User');
    Route::GET('edit/{id}', 'UserController@Edit')->Name('Edit-User');
    Route::POST('edit/{id}', 'UserController@submitEdit')->Name('submit-Edit-User');
    Route::GET('delete/{id}', 'UserController@Delete')->Name('Delete-User');
  });

  Route::prefix('satuankerja')->group(function () {
    Route::GET('', 'SatuanKerjaController@Data')->Name('Data-Satuan-Kerja');
    Route::GET('tambah', 'SatuanKerjaController@Tambah')->Name('Tambah-Satuan-Kerja');
    Route::POST('tambah', 'SatuanKerjaController@submitTambah')->Name('submit-Tambah-Satuan-Kerja');
    Route::GET('edit/{id}', 'SatuanKerjaController@Edit')->Name('Edit-Satuan-Kerja');
    Route::POST('edit/{id}', 'SatuanKerjaController@submitEdit')->Name('submit-Edit-Satuan-Kerja');
    Route::GET('delete/{id}', 'SatuanKerjaController@Delete')->Name('Delete-Satuan-Kerja');
  });

  Route::prefix('unitkerja')->group(function () {
    Route::GET('', 'UnitKerjaController@Data')->Name('Data-Unit-Kerja');
    Route::GET('tambah', 'UnitKerjaController@Tambah')->Name('Tambah-Unit-Kerja');
    Route::POST('tambah', 'UnitKerjaController@submitTambah')->Name('submit-Tambah-Unit-Kerja');
    Route::GET('edit/{id}', 'UnitKerjaController@Edit')->Name('Edit-Unit-Kerja');
    Route::POST('edit/{id}', 'UnitKerjaController@submitEdit')->Name('submit-Edit-Unit-Kerja');
    Route::GET('delete/{id}', 'UnitKerjaController@Delete')->Name('Delete-Unit-Kerja');
  });

  Route::prefix('penyuluh')->group(function () {
    Route::GET('', 'PenyuluhController@Data')->Name('Data-Penyuluh');
    Route::GET('tambah', 'PenyuluhController@Tambah')->Name('Tambah-Penyuluh');
    Route::POST('tambah', 'PenyuluhController@submitTambah')->Name('submit-Tambah-Penyuluh');
    Route::GET('edit/{id}', 'PenyuluhController@Edit')->Name('Edit-Penyuluh');
    Route::POST('edit/{id}', 'PenyuluhController@submitEdit')->Name('submit-Edit-Penyuluh');
    Route::GET('delete/{id}', 'PenyuluhController@Delete')->Name('Delete-Penyuluh');
  });

  Route::prefix('komoditas')->group(function () {
    Route::GET('', 'KomoditasController@Data')->Name('Data-Komoditas');
    Route::GET('tambah', 'KomoditasController@Tambah')->Name('Tambah-Data-Komoditas');
    Route::POST('tambah', 'KomoditasController@submitTambah')->Name('submit-Tambah-Data-Komoditas');
    Route::GET('edit/{id}', 'KomoditasController@Edit')->Name('Edit-Data-Komoditas');
    Route::POST('edit/{id}', 'KomoditasController@submitEdit')->Name('submit-Edit-Data-Komoditas');
    Route::GET('delete/{id}', 'KomoditasController@Delete')->Name('Delete-Data-Komoditas');
  });

  Route::prefix('kota_komoditas')->group(function () {
    Route::GET('', 'KotaKomoditasController@Data')->Name('Data-Kota-Komoditas');
    Route::GET('tambah', 'KotaKomoditasController@Tambah')->Name('Tambah-Kota-Komoditas');
    Route::POST('tambah', 'KotaKomoditasController@submitTambah')->Name('submit-Tambah-Kota-Komoditas');
    Route::GET('edit/{id}', 'KotaKomoditasController@Edit')->Name('Edit-Kota-Komoditas');
    Route::POST('edit/{id}', 'KotaKomoditasController@submitEdit')->Name('submit-Edit-Kota-Komoditas');
  });

  Route::prefix('keltani')->group(function () {
    Route::GET('', 'KelTaniController@Data')->Name('Data-Kelompok-Tani');
    Route::GET('tambah', 'KelTaniController@Tambah')->Name('Tambah-Kelompok-Tani');
    Route::POST('tambah', 'KelTaniController@submitTambah')->Name('submit-Tambah-Kelompok-Tani');
    Route::GET('edit/{id}', 'KelTaniController@Edit')->Name('Edit-Kelompok-Tani');
    Route::POST('edit/{id}', 'KelTaniController@submitEdit')->Name('submit-Edit-Kelompok-Tani');
    Route::GET('delete/{id}', 'KomoditasController@Delete')->Name('Delete-Data-Komoditas');
  });

  Route::prefix('cetak')->group(function () {
    Route::GET('satuankerja', 'CetakController@SatuanKerja')->name('Cetak-Satuan-Kerja');
    Route::GET('unitkerja', 'CetakController@UnitKerja')->name('Cetak-Unit-Kerja');
    Route::GET('penyuluh', 'CetakController@Penyuluh')->name('Cetak-Penyuluh');
  });
});
