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

  Route::group(['prefix' => 'kelompoktani', 'as' => 'kelompokTani'], function () {
    Route::GET('', 'KelTaniController@Data')->Name('Data');
    Route::GET('tambah', 'KelTaniController@TambahForm')->Name('TambahForm');
    Route::POST('tambah', 'KelTaniController@TambahSubmit')->Name('TambahSubmit');
    Route::GET('edit/{id}', 'KelTaniController@EditForm')->Name('EditForm');
    Route::POST('edit/{id}', 'KelTaniController@EditSubmit')->Name('EditSubmit');
    Route::GET('hapus/{id?}/{verify?}', 'KelTaniController@Hapus')->Name('Hapus');
  });

  Route::group(['prefix' => 'p4s', 'as' => 'p4s'], function () {
    Route::GET('', 'P4SController@Data')->Name('Data');
    Route::GET('tambah', 'P4SController@TambahForm')->Name('TambahForm');
    Route::POST('tambah', 'P4SController@TambahSubmit')->Name('TambahSubmit');
    Route::GET('edit/{id}', 'P4SController@EditForm')->Name('EditForm');
    Route::POST('edit/{id}', 'P4SController@EditSubmit')->Name('EditSubmit');
    Route::GET('hapus/{id?}/{verify?}', 'P4SController@Hapus')->Name('Hapus');
  });

  Route::group(['prefix' => 'pelatihan', 'as' => 'pelatihan'], function () {
    Route::GET('', 'PelatihanController@Data')->Name('Data');
    Route::GET('tambah', 'PelatihanController@TambahForm')->Name('TambahForm');
    Route::POST('tambah', 'PelatihanController@TambahSubmit')->Name('TambahSubmit');
    Route::GET('edit/{id}', 'PelatihanController@EditForm')->Name('EditForm');
    Route::POST('edit/{id}', 'PelatihanController@EditSubmit')->Name('EditSubmit');
    Route::GET('hapus/{id?}/{verify?}', 'PelatihanController@Hapus')->Name('Hapus');
  });

  Route::prefix('peserta-pelatihan')->group(function () {
    Route::GET('{idPelatihan}', 'PesertaPelatihanController@Data')->Name('Data-Peserta-Pelatihan');
    Route::GET('{idPelatihan}/tambah', 'PesertaPelatihanController@Tambah')->Name('Tambah-Peserta-Pelatihan');
    Route::POST('{idPelatihan}/tambah', 'PesertaPelatihanController@submitTambah')->Name('submit-Tambah-Peserta-Pelatihan');
    Route::GET('{idPelatihan}/{id}/hapus', 'PesertaPelatihanController@Hapus')->Name('Hapus-Peserta-Pelatihan');
  });

  Route::Group(['prefix' => 'cetak', 'as' => 'cetak'], function () {
    Route::GET('satuankerja', 'CetakController@SatuanKerja')->name('SatuanKerja');
    Route::GET('unitkerja', 'CetakController@UnitKerja')->name('UnitKerja');
    Route::GET('penyuluh', 'CetakController@Penyuluh')->name('Penyuluh');
  });
});
