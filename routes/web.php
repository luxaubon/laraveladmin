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

Route::get('/linelogin','HomeController@linelogin');
Route::post('/register','HomeController@register');

Route::get('/choose','HomeController@choose');
Route::get('/logout','HomeController@logout');

Route::get('/dealer','HomeController@dealer');
Route::post('/province','HomeController@province');
Route::post('/shop_name','HomeController@shop_name');
Route::post('/sendData','HomeController@sendData');
Route::get('/done','HomeController@done');
Route::get('/prize','HomeController@prize');

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


     Route::group(['prefix'=>'/slide/'], function(){
        Route::get('/index','admin\SlideController@index');
        Route::post('/insert','admin\SlideController@store');

        Route::get('/show/{id}','admin\SlideController@show');
        Route::post('/edit/{id}','admin\SlideController@edit');
        
        Route::get('/update_listpic','admin\SlideController@update_listpic');
        Route::get('/del_img','admin\SlideController@del_img');

     });


     Route::group(['prefix'=>'/setting/'], function(){
        Route::get('/index','admin\SettingController@index');

        Route::post('/update','admin\SettingController@edit');

     });

});
