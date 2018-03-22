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
use Illuminate\Support\Facades\Route;

Route::get('/', 'AccueilController@index')->name('homepage');

Route::get('/about', 'AccueilController@about')->name('about');


Route::get('/dunsparce', 'RealisationController@dunsparce');

Route::get('/drifblim', 'RealisationController@drifblim');


Route::get('/shrandom', 'RealisationController@SHRandom');

Route::get('/files', 'FilesController@index');
Route::get('/freedl', 'FilesController@myfiles');
Route::get('/getmyfiles', 'FilesController@getmyfiles');
Route::get('/gettransfert', 'FilesController@gettransfert');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/flush', 'BrawlController@flush')->name('flush');



Route::get('/brawl', 'BrawlController@brawl')->name('brawl');
Route::get('/choice', 'BrawlController@choice')->name('choice');
Route::get('/createplayer/{idp}/{idchar}', 'BrawlController@createplayer')->name('createplayer');
Route::get('/attack/{idp}/{ida}', "BrawlController@attack");
Route::get('/infonp/{idp}', "BrawlController@return_info_player_np");
Route::get('/noblephantasm/{idp}', "BrawlController@noblephantasm");
Route::get('/newturn/{idp}', "BrawlController@newturn")->name('newturn');
Route::get('/win/{idp}', "BrawlController@win")->name('win');
Route::get('/replay', "BrawlController@replay")->name('replay');

