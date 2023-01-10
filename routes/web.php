<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\GroupUserAdd;
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
    return view('top');
});
Route::get('/create', function () {
    return view('group.new');
});

Route::group(['prefix' => '{group_id}'],function(){

Route::get('/group', function () { #TODO: URL CHANGE
    return view('group.index');
});
});



#Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
