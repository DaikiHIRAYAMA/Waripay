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

Route::get('/create', 'App\Http\Controllers\GroupController@create')
    ->name('group.create');

Route::post('/create', 'App\Http\Controllers\GroupController@store')
    ->name('group.store');

Route::get('/member_add', 'App\Http\Controllers\MemberController@create')
    ->name('member.create');

Route::post('/member_add', 'App\Http\Controllers\MemberController@store')
    ->name('member.store');

Route::get('/event', 'App\Http\Controllers\EventController@index')
    ->name('event.index');
    
Route::get('/events', 'App\Http\Controllers\EventController@create')
    ->name('event.create');

Route::group(['prefix' => '{group_id}'],function(){

Route::get('/group', function () { #TODO: URL CHANGE
    return view('group.index');
});
});

Route::get('/phpinfo', function () {
    phpinfo();
});


#Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
