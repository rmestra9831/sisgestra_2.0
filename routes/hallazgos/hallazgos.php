<?php

Route::get('/create', 'HallazgoController@index')->name('indexFindings')->middleware('auth');
Route::post('store', 'HallazgoController@store')->name('finding.store')->middleware('auth');

Route::get('/TypeFindings', 'HallazgoController@TypeFindings')->name('TypeFindings')->middleware('auth');
Route::get('/getFindings', 'FilterController@getFindings')->name('getFindings')->middleware('auth');

