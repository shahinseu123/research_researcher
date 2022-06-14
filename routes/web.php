<?php

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
// auth 
Route::get('/', 'login\LoginController@login')->name('login');
Route::post('/login/action', 'login\LoginController@login_action')->name('login.action');
Route::get('/register', 'register\RegisterController@register')->name('register');
Route::post('/register/action', 'register\RegisterController@register_action')->name('register.action');
// admin panel 
Route::middleware('auth')->prefix('user')->group(function () {
    // Route::get('/dashboard', 'admin\ResearcherController@dashboard')->name('user.dashboard');
    Route::get('/logout', 'admin\ResearcherController@logout')->name('user.logout');
    Route::get('/research-progress', 'admin\ResearchController@index')->name('user.research-progress');

    Route::get('/add-progress', 'admin\ResearchController@add')->name('add-progress');

    Route::get('/progress/show/{id}', 'admin\ResearchController@show')->name('researh.show');
    Route::get('/researcher/edit/profile', 'admin\ResearcherController@edit')->name('user.update-profile');
    Route::post('/researcher/update', 'admin\ResearcherController@update')->name('researcher-update');
});
