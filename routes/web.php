<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/gereja/tambah', 'GerejaController@tambahView')->name('gereja.tambah');

Route::post('/gereja/tambah', 'GerejaController@tambah')->name('gereja.tambah');

Route::get('/gereja/jadwal/tambah', 'JadwalIbadahController@tambahView')->name('gereja.jadwal.tambah');

Route::post('/gereja/jadwal/tambah', 'JadwalIbadahController@tambah')->name('gereja.jadwal.tambah');

Route::get("autoCompleteGereja", array('as'=>'autoCompleteGereja', 'uses'=>'GerejaController@autoCompleteGereja'));

Route::get('getJadwalGereja/{id}', 'JadwalIbadahController@allJadwalIbadahId')->name('getJadwalGereja');

/*Route::get('/gereja/jadwal/tambah', function(){
	return view('gereja.tambahJadwal');
});*/
