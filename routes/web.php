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


Route::get('/', function () {
    return view('welcome');
});



// Route::view('/', 'index')

// Route::name('uesr.')->group(function(){
//     Route::view('/private', 'private')->middleware('auth')->name('private');

//     Route::get('/login', function(){
//         if(Auth::check()){
//             return redirect(route('user.private'));
//         }
//         return view('login');
//     })->name('login');

//     //Route::post('/login', [])

//     //Route::get('/logoout', [])->name('logout');

//     Route::get('/registration', function(){
//         if(Auth::check()){
//             return redirect(route('user.private'));
//         }
//         return view('registration');
//     })->name('registration')

//     //Route::post('/registration', []);
// })