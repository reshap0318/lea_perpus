<?php

Route::get('/','transaksiController@home');
Route::get('carihome','transaksiController@carihome');
Route::get('list-buku','transaksiController@list');
// route::get('data-buku/{id}','transaksiController@data');
route::get('cek/{nim}/{id}','transaksiController@cek');

//image
Route::get('img/{type}/{file_id}','FileController@image');
