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

Route::get('/OTP','HomeController@OTP');
Route::get('/register','HomeController@register');

Route::post('/registerPhone','HomeController@registerPhone');
Route::post('/updateProfile','HomeController@updateProfile');

Route::get('/login','HomeController@login');
Route::get('/member','HomeController@member');
Route::get('/profile','HomeController@profile');
Route::get('/history','HomeController@history');
Route::get('/logout','HomeController@logout');

Route::get('/results','HomeController@results');
Route::get('/rules','HomeController@rules');

Route::get('/toppender','HomeController@toppender');

Route::post('/ocr', 'OcrController@ocrImage');

Route::post('/checkCode', 'HomeController@checkCode');
//Route::get('/checkCode', 'HomeController@checkCode');

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


    Route::group(['prefix'=>'/toppender/'], function(){

        Route::get('/index','admin\ToppenderController@index');
    	Route::post('/insert','admin\ToppenderController@store');

        Route::get('/show/{id}','admin\ToppenderController@show');
        Route::post('/edit/{id}','admin\ToppenderController@edit');
        Route::get('/del_content','admin\ToppenderController@del_content');

        Route::get('/update_listpic','admin\ToppenderController@update_listpic');
        Route::get('/del_img','admin\ToppenderController@del_img');

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
    Route::group(['prefix'=>'/toprank/'], function(){
        Route::get('/index','admin\ToprankController@index');
        Route::get('/zip','admin\ToprankController@zipFiles');

    });
    Route::group(['prefix'=>'/toprank1/'], function(){
        Route::get('/index','admin\Toprank1Controller@index');
        Route::get('/zip','admin\Toprank1Controller@zipFiles');

    });
    Route::group(['prefix'=>'/toprank2/'], function(){
        Route::get('/index','admin\Toprank2Controller@index');
        Route::get('/zip','admin\Toprank2Controller@zipFiles');

    });
    Route::group(['prefix'=>'/toprank3/'], function(){
        Route::get('/index','admin\Toprank3Controller@index');
        Route::get('/zip','admin\Toprank3Controller@zipFiles');

    });
    
    Route::group(['prefix'=>'/member/'], function(){
        Route::get('/index','admin\MemberController@index');
        Route::get('/zip','admin\MemberController@zipFiles');
    });
    Route::group(['prefix'=>'/member1/'], function(){
        Route::get('/index','admin\Member1Controller@index');
        Route::get('/zip','admin\Member1Controller@zipFiles');
    });
    Route::group(['prefix'=>'/member2/'], function(){
        Route::get('/index','admin\Member2Controller@index');
        Route::get('/zip','admin\Member2Controller@zipFiles');
    });
    Route::group(['prefix'=>'/member3/'], function(){
        Route::get('/index','admin\Member3Controller@index');
        Route::get('/zip','admin\Member3Controller@zipFiles');
    });

    Route::group(['prefix'=>'/user/'], function(){
        Route::get('/index','admin\UserController@index');
        Route::post('/insert','admin\UserController@store');

        Route::get('/show/{id}','admin\UserController@show');
        Route::post('/edit/{id}','admin\UserController@edit');
        Route::get('/del_content','admin\UserController@del_content');
        
        Route::get('/update_listpic','admin\UserController@update_listpic');
        Route::get('/del_img','admin\UserController@del_img');

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


     Route::group(['prefix'=>'/setting/'], function(){
        Route::get('/index','admin\SettingController@index');

        Route::post('/update','admin\SettingController@edit');

     });

});
