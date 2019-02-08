<?php

Route::get('/','transaksiController@home');
Route::post('carihome','transaksiController@carihome');
Route::get('list-buku','transaksiController@list');
route::get('data-buku/{id}','transaksiController@data');
route::get('cek','transaksiController@cek');

//image
Route::get('img/{type}/{file_id}','FileController@image');
