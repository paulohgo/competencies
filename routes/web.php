<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
    return view('welcome');
});

//Levels
Route::get('levels', 'App\Http\Controllers\LevelController@index')->name('levels.index');
Route::get('levels/create', 'App\Http\Controllers\LevelController@create')->name('levels.create');
Route::post('levels/list', 'App\Http\Controllers\LevelController@list')->name('levels.list');
Route::post('levels/store', 'App\Http\Controllers\LevelController@store')->name('levels.store');
Route::get('levels/edit/{level}', 'App\Http\Controllers\LevelController@edit')->name('levels.edit');
Route::put('levels/update/{level}', 'App\Http\Controllers\LevelController@update')->name('levels.update');
Route::delete('levels/destroy/{level}', 'App\Http\Controllers\LevelController@destroy')->name('levels.destroy');


//Factors
Route::get('factors', 'App\Http\Controllers\FactorController@index')->name('factors.index');
Route::get('factors/create', 'App\Http\Controllers\FactorController@create')->name('factors.create');
Route::post('factors/store', 'App\Http\Controllers\FactorController@store')->name('factors.store');
Route::get('factors/edit/{factor}', 'App\Http\Controllers\FactorController@edit')->name('factors.edit');
Route::put('factors/update/{factor}', 'App\Http\Controllers\FactorController@update')->name('factors.update');
Route::delete('factors/destroy/{factor}', 'App\Http\Controllers\FactorController@destroy')->name('factors.destroy');

//Competencies
Route::get('competencies', 'App\Http\Controllers\CompetencyController@index')->name('competencies.index');
Route::get('competencies/create', 'App\Http\Controllers\CompetencyController@create')->name('competencies.create');
Route::post('competencies/store', 'App\Http\Controllers\CompetencyController@store')->name('competencies.store');
Route::post('competencies/list', 'App\Http\Controllers\CompetencyController@list')->name('competencies.list');
Route::post('competencies/map', 'App\Http\Controllers\CompetencyController@map')->name('competencies.map');
Route::get('competencies/edit/{competency}', 'App\Http\Controllers\CompetencyController@edit')->name('competencies.edit');
Route::put('competencies/update/{competency}', 'App\Http\Controllers\CompetencyController@update')->name('competencies.update');
Route::delete('competencies/destroy/{competency}', 'App\Http\Controllers\CompetencyController@destroy')->name('competencies.destroy');


