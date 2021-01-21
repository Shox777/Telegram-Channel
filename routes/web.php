<?php

use App\Models\Article;
use App\Models\Bot;
use Illuminate\Support\Facades\Route;

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
Route::get('/edit', function () {
    return view('articles/edit');
});

Route::get('/articles', 'App\Http\Controllers\ArticlesController@index');
Route::post('/articles', 'App\Http\Controllers\ArticlesController@store');
Route::get('/create', function () {
    return view('articles/create');
});


Route::get('/articles/create', 'App\Http\Controllers\ArticlesController@create')->middleware('auth');
Route::get('/articles/{id}', 'App\Http\Controllers\ArticlesController@show');
Route::get('/articles/{article}/edit', 'App\Http\Controllers\BotController@edit');
Route::get('/bot', 'App\Http\Controllers\BotController@index');
Route::put('/bot/{$id}', 'App\Http\Controllers\BotController@update');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
