<?php

Route::get('/create', 'HallazgoController@index')->name('indexFindings')->middleware('auth');
Route::post('store', 'HallazgoController@store')->name('finding.store')->middleware('auth');

Route::get('/TypeFindings', 'HallazgoController@TypeFindings')->name('TypeFindings')->middleware('auth');
Route::get('/{finding}/view', 'HallazgoController@viewFindingByAll')->name('viewFindingByAll')->middleware('auth');
Route::get('/getFindings', 'FilterController@getFindings')->name('getFindings')->middleware('auth');

Route::get('/{finding}/edit', 'HallazgoController@editFindingView')->name('editFindingView')->middleware(['auth','can:edit register']);
Route::put('/{finding}/update', 'HallazgoController@updateFinding')->name('updateFinding.update')->middleware(['auth','can:edit register']);
Route::delete('/{finding}/delete', 'HallazgoController@deleteFinding')->name('deleteFinding.delete')->middleware(['auth','can:delete register']);
Route::get('/{finding}/download/file', 'HallazgoController@downloadFile')->name('downloadFile')->middleware('auth');

