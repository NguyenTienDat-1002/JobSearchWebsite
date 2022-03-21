<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use  App\Http\Controllers;

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

Auth::routes();

Route::get('/', function () {
    return redirect(route("employee.home"));
});

Route::get('home', function () {
    return redirect(route("employee.home"));
});

Route::name('employee.')->prefix('employee')->group(function (){

    Route::any('/', 'EmployeeController@index')->name('home');

    Route::get('login', 'EmployeeAccountController@ShowLogin')->name('login.show');

    Route::post('login', 'EmployeeAccountController@Login')->name('login');

    Route::get('register', 'EmployeeAccountController@create')->name('register.show');

    Route::post('register', 'EmployeeAccountController@store')->name('register');

    Route::any('logout', 'EmployeeAccountController@logout')->name('logout');
    
    Route::any('industry/{id}','IndustryController@show')->name('industry');
    
    Route::get('search', 'PostController@index')->name('search');

    Route::post('search', 'PostController@search')->name('searchpost');

    Route::get('job/{id}','PostController@show')->name("job.show");

    Route::middleware('employee')->group(function(){
        Route::get('job/{id}/apply','CVController@create')->name("job.apply.show");

        Route::post('job/{id}/apply','CVController@store')->name("job.apply.submit");
    });
});

Route::name('employer.')->prefix('employer')->group(function(){

    Route::any('/', 'EmployerController@index')->name('home');

    Route::get('login', 'EmployerAccountController@ShowLogin')->name('login.show');

    Route::post('login','EmployerAccountController@Login')->name('login');

    Route::get('register','EmployerAccountController@create')->name('register.show');

    Route::post('register', 'EmployerAccountController@store')->name('register');

    Route::any('logout', 'EmployerAccountController@Logout')->name('logout');
    
    Route::middleware('employer')->group(function(){

        Route::get('contact/create', function(){
            return view('contact');
        })->name('contact.create');
    
        Route::get('post/create','PostController@create')->name('post.create');

        Route::post('post/store','PostController@store')->name('post.store');
        
        Route::get('post/list','PostController@employerPosts')->name('posts');

        Route::get('post/{id}','PostController@employerPost')->name('post');

        Route::get('post/{id}/edit','PostController@edit')->name('post.edit');

        Route::post('post/{id}/update','PostController@update')->name('post.update');

        Route::get('post/{id}/CV','CVController@listCV')->name('post.listCV');

        Route::any('post/{id}/delete','PostController@destroy')->name('post.destroy');
    });
});

Route::name('admin.')->prefix('admin')->group(function() {

    Route::get('login', 'AdminController@ShowLogin')->name('login.show');

    Route::post('login','AdminController@Login')->name('login');

    Route::any('logout', 'AdminController@Logout')->name('logout');

    Route::any('defaultadmin', 'AdminController@defaultadmin');
    
    Route::middleware('admin')->group(function(){
    
        Route::any('/', 'AdminController@index')->name('home');

        Route::any('listadmin','AdminController@ListAdmin')->name('list');

        Route::any('home',function(){   return redirect(route('home'));});
    
        Route::any('post/search','AdminController@searchpost')->name('post.search');

        Route::get('post/{id}','AdminController@postDetail')->name('post.detail');

        Route::get('uncheckedpost/{id}/check', 'AdminController@Check')->name('post.check');

        Route::get('post/{id}/delete', 'AdminController@postDelete')->name('post.delete');

        Route::get('create','AdminController@create')->name('create');

        Route::post('create','AdminController@store')->name('store');

        Route::any('{id}/destroy', 'AdminController@destroy')->name('destroy');
    });
});

