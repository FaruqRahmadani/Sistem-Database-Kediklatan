<?php
Route::GET('logout', 'Auth\LoginController@logout')->name('logout');
Route::GET('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::POST('login', 'Auth\LoginController@login');


Route::group(['middleware' => ['UserMiddleware']], function () {
  Route::GET('', 'DashboardController@Dashboard')->Name('Dashboard');

  Route::group(['prefix' => 'user', 'as' => 'user'], function () {
    Route::GET('', 'UserController@Data')->Name('Data');
    Route::GET('tambah', 'UserController@TambahForm')->Name('TambahForm');
    Route::POST('tambah', 'UserController@TambahSubmit')->Name('TambahSubmit');
    Route::GET('edit/{id}', 'UserController@EditForm')->Name('EditForm');
    Route::POST('edit/{id}', 'UserController@EditSubmit')->Name('EditSubmit');
    Route::GET('hapus/{id?}/{verify?}', 'UserController@Hapus')->Name('Hapus');
  });

  Route::group(['prefix' => 'satuankerja', 'as' => 'satuanKerja'], function () {
    Route::GET('', 'SatuanKerjaController@Data')->Name('Data');
    Route::GET('tambah', 'SatuanKerjaController@TambahForm')->Name('TambahForm');
    Route::POST('tambah', 'SatuanKerjaController@TambahSubmit')->Name('TambahSubmit');
    Route::GET('edit/{id}', 'SatuanKerjaController@EditForm')->Name('EditForm');
    Route::POST('edit/{id}', 'SatuanKerjaController@EditSubmit')->Name('EditSubmit');
    Route::GET('hapus/{id?}/{verify?}', 'SatuanKerjaController@Hapus')->Name('Hapus');
  });

  Route::group(['prefix' => 'unitkerja', 'as' => 'unitKerja'], function () {
    Route::GET('', 'UnitKerjaController@Data')->Name('Data');
    Route::GET('tambah', 'UnitKerjaController@TambahForm')->Name('TambahForm');
    Route::POST('tambah', 'UnitKerjaController@TambahSubmit')->Name('TambahSubmit');
    Route::GET('edit/{id}', 'UnitKerjaController@EditForm')->Name('EditForm');
    Route::POST('edit/{id}', 'UnitKerjaController@EditSubmit')->Name('EditSubmit');
    Route::GET('hapus/{id?}/{verify?}', 'UnitKerjaController@Hapus')->Name('Hapus');
  });

  Route::group(['prefix' => 'penyuluh', 'as' => 'penyuluh'], function () {
    Route::GET('', 'PenyuluhController@Data')->Name('Data');
    Route::GET('tambah', 'PenyuluhController@TambahForm')->Name('TambahForm');
    Route::POST('tambah', 'PenyuluhController@TambahSubmit')->Name('TambahSubmit');
    Route::GET('edit/{id}', 'PenyuluhController@EditForm')->Name('EditForm');
    Route::POST('edit/{id}', 'PenyuluhController@EditSubmit')->Name('EditSubmit');
    Route::GET('hapus/{id?}/{verify?}', 'PenyuluhController@Hapus')->Name('Hapus');
  });

  Route::group(['prefix' => 'komoditas', 'as' => 'komoditas'], function () {
    Route::GET('', 'KomoditasController@Data')->Name('Data');
    Route::GET('tambah', 'KomoditasController@TambahForm')->Name('TambahForm');
    Route::POST('tambah', 'KomoditasController@TambahSubmit')->Name('TambahSubmit');
    Route::GET('edit/{id}', 'KomoditasController@EditForm')->Name('EditForm');
    Route::POST('edit/{id}', 'KomoditasController@EditSubmit')->Name('EditSubmit');
    Route::GET('hapus/{id?}/{verify?}', 'KomoditasController@Hapus')->Name('Hapus');
  });

  Route::group(['prefix' => 'kotakomoditas', 'as' => 'kotaKomoditas'], function () {
    Route::GET('', 'KotaKomoditasController@Data')->Name('Data');
    Route::GET('tambah', 'KotaKomoditasController@TambahForm')->Name('TambahForm');
    Route::POST('tambah', 'KotaKomoditasController@TambahSubmit')->Name('TambahSubmit');
    Route::GET('edit/{id}', 'KotaKomoditasController@EditForm')->Name('EditForm');
    Route::POST('edit/{id}', 'KotaKomoditasController@EditSubmit')->Name('EditSubmit');
  });

  Route::prefix('keltani')->group(function () {
    Route::GET('', 'KelTaniController@Data')->Name('Data-Kelompok-Tani');
    Route::GET('tambah', 'KelTaniController@Tambah')->Name('Tambah-Kelompok-Tani');
    Route::POST('tambah', 'KelTaniController@submitTambah')->Name('submit-Tambah-Kelompok-Tani');
    Route::GET('edit/{id}', 'KelTaniController@Edit')->Name('Edit-Kelompok-Tani');
    Route::POST('edit/{id}', 'KelTaniController@submitEdit')->Name('submit-Edit-Kelompok-Tani');
    Route::GET('delete/{id}', 'KelTaniController@Delete')->Name('Delete-Kelompok-Tani');
  });

  Route::prefix('p4s')->group(function () {
    Route::GET('', 'P4SController@Data')->Name('Data-P4S');
    Route::GET('tambah', 'P4SController@Tambah')->Name('Tambah-P4S');
    Route::POST('tambah', 'P4SController@submitTambah')->Name('submit-Tambah-P4S');
    Route::GET('edit/{id}', 'P4SController@Edit')->Name('Edit-P4S');
    Route::POST('edit/{id}', 'P4SController@submitEdit')->Name('submit-Edit-P4S');
    Route::GET('delete/{id}', 'P4SController@Delete')->Name('Delete-P4S');
  });

  Route::Group(['prefix' => 'cetak', 'as' => 'cetak'], function () {
    Route::GET('satuankerja', 'CetakController@SatuanKerja')->name('SatuanKerja');
    Route::GET('unitkerja', 'CetakController@UnitKerja')->name('UnitKerja');
    Route::GET('penyuluh', 'CetakController@Penyuluh')->name('Penyuluh');
  });
});
