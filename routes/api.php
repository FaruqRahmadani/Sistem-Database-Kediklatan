<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api']], function () {
  Route::GET('dataprovinsi', 'JsonController@DataProvinsi');
  Route::GET('datakota/{ProvinsiId?}', 'JsonController@DataKota');
  Route::GET('datasatuankerja', 'JsonController@DataSatuanKerja');
  Route::GET('dataunitkerja', 'JsonController@DataUnitKerja');
  Route::GET('datakomoditas/{Id?}', 'JsonController@DataKomoditas');
});
