<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api']], function () {
  Route::GET('dataprovinsi', 'JsonController@DataProvinsi');
  Route::GET('datakota/{ProvinsiId?}', 'JsonController@DataKota');
  Route::GET('satuankerja/data', 'JsonController@DataSatuanKerja');
  Route::POST('satuankerja/tambah', 'JsonController@TambahSatuanKerja');
  Route::GET('unitkerja/data', 'JsonController@DataUnitKerja');
  Route::POST('unitkerja/tambah', 'JsonController@TambahUnitKerja');
  Route::GET('datakomoditas/{Id?}', 'JsonController@DataKomoditas');
});
