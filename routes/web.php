<?php

use App\Http\Controllers\Grades\GradeController ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::group(['middleware'=>'guest'],function () {
    Route::get('/',function(){
        return view('auth.login');
    });
});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ,'auth']
    ], function(){ //...

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::resource('/grades',GradeController::class)->names('grades');
    });
    
