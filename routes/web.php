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
//use Auth;



Route::resource('/','HomeController');
Route::resource('/home','HomeController');


Route::post('/sendOTP','HomeController@sendOTP');
Route::get('/choose','HomeController@Choose');
Route::post('/sendPercentage','HomeController@sendPercentage');


Route::get('/admin', function () {
    return view('admin.login');
})->name('login');

Route::post('/admin/login','admin\SessionsController@store');

Route::group(['prefix'=>'/admin', 'middleware'=>['admin'] ],function(){
    Route::get('/logout','admin\SessionsController@destroy');
    
    Route::group(['prefix'=>'/dashboard/'], function(){
        Route::get('/index','admin\IndexController@index')->name('home'); 

        Route::get('/register','admin\RegistrationController@index');
        Route::post('/register','admin\RegistrationController@store');

        Route::get('/show/{id}','admin\RegistrationController@show');
        Route::post('/edit/{id}','admin\RegistrationController@edit');
        Route::get('/del_content','admin\RegistrationController@del_content');

        //Route::get('/listadmin','admin\RegistrationController@show');
    });


    Route::group(['prefix'=>'/page/'], function(){

        Route::get('/index','admin\PagesController@index');
    	Route::post('/insert','admin\PagesController@store');

        Route::get('/show/{id}','admin\PagesController@show');
        Route::post('/edit/{id}','admin\PagesController@edit');
        Route::get('/del_content','admin\PagesController@del_content');

        Route::get('/update_listpic','admin\PagesController@update_listpic');
        Route::get('/del_img','admin\PagesController@del_img');

    });

    Route::group(['prefix'=>'/shopcode/'], function(){

        Route::get('/index','admin\ShopcodeController@index');
    	Route::post('/insert','admin\ShopcodeController@store');

        Route::get('/show/{id}','admin\ShopcodeController@show');
        Route::post('/edit/{id}','admin\ShopcodeController@edit');
        Route::get('/del_content','admin\ShopcodeController@del_content');

        Route::get('/update_listpic','admin\ShopcodeController@update_listpic');
        Route::get('/del_img','admin\ShopcodeController@del_img');

    });

     Route::group(['prefix'=>'/slide/'], function(){
        Route::get('/index','admin\SlideController@index');
        Route::post('/insert','admin\SlideController@store');

        Route::get('/show/{id}','admin\SlideController@show');
        Route::post('/edit/{id}','admin\SlideController@edit');
        
        Route::get('/update_listpic','admin\SlideController@update_listpic');
        Route::get('/del_img','admin\SlideController@del_img');

     });
     Route::group(['prefix'=>'/client/'], function(){
        Route::get('/index','admin\ClientController@index');
        Route::post('/insert','admin\ClientController@store');

        Route::get('/show/{id}','admin\ClientController@show');
        Route::post('/edit/{id}','admin\ClientController@edit');
        
        Route::get('/update_listpic','admin\ClientController@update_listpic');
        Route::get('/del_img','admin\ClientController@del_img');

     });

      Route::group(['prefix'=>'/trees/'], function(){
        Route::get('/index','admin\TreesController@index');
        Route::post('/insert','admin\TreesController@store');

        Route::get('/show/{id}','admin\TreesController@show');
        Route::post('/edit/{id}','admin\TreesController@edit');
        Route::get('/del_content','admin\TreesController@del_content');
     });

       Route::group(['prefix'=>'/products/'], function(){
        
        Route::get('/index','admin\ProductsController@index');
        Route::post('/insert','admin\ProductsController@store');

        Route::get('/show/{id}','admin\ProductsController@show');
        Route::post('/edit/{id}','admin\ProductsController@edit');
        Route::get('/del_content','admin\ProductsController@del_content');

        Route::get('/update_listpic','admin\ProductsController@update_listpic');
        Route::get('/del_img','admin\ProductsController@del_img');

     });

     Route::group(['prefix'=>'/setting/'], function(){
        Route::get('/index','admin\SettingController@index');

        Route::post('/update','admin\SettingController@edit');

     });

});
