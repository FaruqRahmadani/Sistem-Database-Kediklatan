<?php
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');


Route::get('', 'DashboardController@Dashboard')->name('Dashboard');
Route::group(['prefix' => 'data', 'as' => 'public'], function () {
  Route::get('penyuluh', 'PenyuluhController@Data')->name('Penyuluh');
  Route::get('kelompoktani', 'KelTaniController@Data')->name('KelompokTani');
  Route::get('p4s', 'P4SController@Data')->name('P4S');
});

Route::group(['middleware' => ['UserMiddleware']], function () {

  Route::group(['middleware' => ['PesertaMiddleware']], function () {
    Route::group(['prefix' => 'ubah-data', 'as' => 'ubahData'], function () {
      Route::get('', 'HomeController@ubahData');
      Route::post('', 'HomeController@ubahDataSubmit')->name('Submit');
    });
    Route::group(['prefix' => 'ubah-auth', 'as' => 'ubahAuth'], function () {
      Route::get('', 'HomeController@ubahAuth');
      Route::post('', 'HomeController@ubahAuthSubmit')->name('Submit');
    });
  });

  Route::group(['middleware' => ['AdminMiddleware']], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin'], function () {
      Route::get('', 'AdminController@data')->Name('Data');
      Route::get('tambah', 'AdminController@tambahForm')->Name('TambahForm');
      Route::post('tambah', 'AdminController@tambahSubmit')->Name('TambahSubmit');
      Route::get('edit/{id}', 'AdminController@editForm')->Name('EditForm');
      Route::post('edit/{id}', 'AdminController@editSubmit')->Name('EditSubmit');
      Route::get('hapus/{id?}/{verify?}', 'AdminController@hapus')->Name('Hapus');
    });

    Route::group(['prefix' => 'satuankerja', 'as' => 'satuanKerja'], function () {
      Route::get('', 'SatuanKerjaController@Data')->Name('Data');
      Route::get('tambah', 'SatuanKerjaController@TambahForm')->Name('TambahForm');
      Route::post('tambah', 'SatuanKerjaController@TambahSubmit')->Name('TambahSubmit');
      Route::get('edit/{id}', 'SatuanKerjaController@EditForm')->Name('EditForm');
      Route::post('edit/{id}', 'SatuanKerjaController@EditSubmit')->Name('EditSubmit');
      Route::get('hapus/{id?}/{verify?}', 'SatuanKerjaController@Hapus')->Name('Hapus');
    });

    Route::group(['prefix' => 'unitkerja', 'as' => 'unitKerja'], function () {
      Route::get('', 'UnitKerjaController@Data')->Name('Data');
      Route::get('tambah', 'UnitKerjaController@TambahForm')->Name('TambahForm');
      Route::post('tambah', 'UnitKerjaController@TambahSubmit')->Name('TambahSubmit');
      Route::get('edit/{id}', 'UnitKerjaController@EditForm')->Name('EditForm');
      Route::post('edit/{id}', 'UnitKerjaController@EditSubmit')->Name('EditSubmit');
      Route::get('hapus/{id?}/{verify?}', 'UnitKerjaController@Hapus')->Name('Hapus');
    });

    Route::group(['prefix' => 'penyuluh', 'as' => 'penyuluh'], function () {
      Route::get('', 'PenyuluhController@Data')->Name('Data');
      Route::get('export', 'PenyuluhController@exportData')->Name('Export');
      Route::get('import', 'PenyuluhController@importForm')->Name('ImportForm');
      Route::post('import', 'PenyuluhController@importSubmit')->Name('ImportSubmit');
      Route::get('detail/{id}', 'PenyuluhController@detail')->Name('Detail');
      Route::get('tambah', 'PenyuluhController@TambahForm')->Name('TambahForm');
      Route::post('tambah', 'PenyuluhController@TambahSubmit')->Name('TambahSubmit');
      Route::get('edit/{id}', 'PenyuluhController@EditForm')->Name('EditForm');
      Route::post('edit/{id}', 'PenyuluhController@EditSubmit')->Name('EditSubmit');
      Route::get('hapus/{id?}/{verify?}', 'PenyuluhController@Hapus')->Name('Hapus');
    });

    Route::group(['prefix' => 'komoditas', 'as' => 'komoditas'], function () {
      Route::get('', 'KomoditasController@Data')->Name('Data');
      Route::get('tambah', 'KomoditasController@TambahForm')->Name('TambahForm');
      Route::post('tambah', 'KomoditasController@TambahSubmit')->Name('TambahSubmit');
      Route::get('edit/{id}', 'KomoditasController@EditForm')->Name('EditForm');
      Route::post('edit/{id}', 'KomoditasController@EditSubmit')->Name('EditSubmit');
      Route::get('hapus/{id?}/{verify?}', 'KomoditasController@Hapus')->Name('Hapus');
    });

    Route::group(['prefix' => 'kotakomoditas', 'as' => 'kotaKomoditas'], function () {
      Route::get('', 'KotaKomoditasController@Data')->Name('Data');
      Route::get('tambah', 'KotaKomoditasController@TambahForm')->Name('TambahForm');
      Route::post('tambah', 'KotaKomoditasController@TambahSubmit')->Name('TambahSubmit');
      Route::get('edit/{id}', 'KotaKomoditasController@EditForm')->Name('EditForm');
      Route::post('edit/{id}', 'KotaKomoditasController@EditSubmit')->Name('EditSubmit');
    });

    Route::group(['prefix' => 'kelompoktani', 'as' => 'kelompokTani'], function () {
      Route::get('', 'KelTaniController@Data')->Name('Data');
      Route::get('export', 'KelTaniController@exportData')->Name('Export');
      Route::get('detail/{id}', 'KelTaniController@detail')->Name('Detail');
      Route::get('tambah', 'KelTaniController@TambahForm')->Name('TambahForm');
      Route::post('tambah', 'KelTaniController@TambahSubmit')->Name('TambahSubmit');
      Route::get('edit/{id}', 'KelTaniController@EditForm')->Name('EditForm');
      Route::post('edit/{id}', 'KelTaniController@EditSubmit')->Name('EditSubmit');
      Route::get('hapus/{id?}/{verify?}', 'KelTaniController@Hapus')->Name('Hapus');
    });

    Route::group(['prefix' => 'p4s', 'as' => 'p4s'], function () {
      Route::get('', 'P4SController@Data')->Name('Data');
      Route::get('export', 'P4SController@exportData')->Name('Export');
      Route::get('detail/{id}', 'P4SController@detail')->Name('Detail');
      Route::get('tambah', 'P4SController@TambahForm')->Name('TambahForm');
      Route::post('tambah', 'P4SController@TambahSubmit')->Name('TambahSubmit');
      Route::get('edit/{id}', 'P4SController@EditForm')->Name('EditForm');
      Route::post('edit/{id}', 'P4SController@EditSubmit')->Name('EditSubmit');
      Route::get('hapus/{id?}/{verify?}', 'P4SController@Hapus')->Name('Hapus');
    });

    Route::group(['prefix' => 'pelatihan', 'as' => 'pelatihan'], function () {
      Route::get('', 'PelatihanController@Data')->Name('Data');
      Route::get('tambah', 'PelatihanController@TambahForm')->Name('TambahForm');
      Route::post('tambah', 'PelatihanController@TambahSubmit')->Name('TambahSubmit');
      Route::get('edit/{id}', 'PelatihanController@EditForm')->Name('EditForm');
      Route::post('edit/{id}', 'PelatihanController@EditSubmit')->Name('EditSubmit');
      Route::get('hapus/{id?}/{verify?}', 'PelatihanController@Hapus')->Name('Hapus');
    });

    Route::group(['prefix' => 'pesertapelatihan/{idPelatihan}', 'as' => 'pesertaPelatihan'], function () {
      Route::get('', 'PesertaPelatihanController@Data')->Name('Data');
      Route::get('tambah', 'PesertaPelatihanController@TambahForm')->Name('TambahForm');
      Route::post('tambah', 'PesertaPelatihanController@TambahSubmit')->Name('TambahSubmit');
      Route::get('hapus/{id?}/{verify?}', 'PesertaPelatihanController@Hapus')->Name('Hapus');
    });

    Route::Group(['prefix' => 'pencarian', 'as' => 'pencarian'], function () {
      Route::get('', 'DashboardController@FormPencarian')->Name('Form');
      Route::post('penyuluh', 'DashboardController@DataPenyuluhFilter')->Name('Penyuluh');
      Route::post('kelompoktani', 'DashboardController@DataKelTaniFilter')->Name('KelTani');
    });

    Route::Group(['prefix' => 'cetak', 'as' => 'cetak'], function () {
      Route::get('satuankerja', 'CetakController@SatuanKerja')->name('SatuanKerja');
      Route::get('unitkerja', 'CetakController@UnitKerja')->name('UnitKerja');
      Route::Group(['prefix' => 'penyuluh', 'as' => 'Penyuluh'], function () {
        Route::get('', 'CetakController@Penyuluh');
        Route::get('detail/{id}', 'CetakController@penyuluhDetail')->Name('Detail');
      });
      Route::Group(['prefix' => 'kelompoktani', 'as' => 'KelompokTani'], function () {
        Route::get('', 'CetakController@kelompokTani');
        Route::get('detail/{id}', 'CetakController@kelompokTaniDetail')->Name('Detail');
      });
      Route::Group(['prefix' => 'p4s', 'as' => 'P4s'], function () {
        Route::get('', 'CetakController@p4s');
        Route::get('detail/{id}', 'CetakController@p4sDetail')->Name('Detail');
      });
    });

    Route::Group(['prefix' => 'pengaturan', 'as' => 'pengaturan'], function () {
      Route::get('', 'PengaturanController@form')->name('Form');
    });
  });
});
