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
Route::get('/moderntrade','HomeController@moderntrade');

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

       // Route::get('/update_listpic','admin\PagesController@update_listpic');
       // Route::get('/del_img','admin\PagesController@del_img');

    });
    Route::group(['prefix'=>'/special/'], function(){

        Route::get('/index','admin\SpecialController@index');
    	Route::post('/insert','admin\SpecialController@store');

        Route::get('/show/{id}','admin\SpecialController@show');
        Route::post('/edit/{id}','admin\SpecialController@edit');
        Route::get('/del_content','admin\SpecialController@del_content');

       // Route::get('/update_listpic','admin\SpecialController@update_listpic');
       // Route::get('/del_img','admin\SpecialController@del_img');

    });

    

    Route::group(['prefix'=>'/receipt_wait/'], function(){
        Route::get('/index','admin\ReceiptWaitController@index');
        Route::get('/show/{id}','admin\ReceiptWaitController@show');
        Route::post('/edit/{id}','admin\ReceiptWaitController@edit');
        Route::get('/del_img','admin\ReceiptWaitController@del_img');
        Route::get('/del_content','admin\ReceiptWaitController@del_content');

        //Route::get('/zip','admin\ReceiptWaitController@zipFiles');
    });
    Route::group(['prefix'=>'/receipt_app/'], function(){
        Route::get('/index','admin\ReceiptAppController@index');
        Route::get('/show/{id}','admin\ReceiptAppController@show');
        Route::post('/edit/{id}','admin\ReceiptAppController@edit');
        Route::get('/del_img','admin\ReceiptAppController@del_img');
        Route::get('/del_content','admin\ReceiptAppController@del_content');

        //Route::get('/zip','admin\ReceiptAppController@zipFiles');
    });
    Route::group(['prefix'=>'/receipt_reject/'], function(){
        Route::get('/index','admin\ReceiptRejectController@index');
        Route::get('/show/{id}','admin\ReceiptRejectController@show');
        Route::post('/edit/{id}','admin\ReceiptRejectController@edit');
        Route::get('/del_img','admin\ReceiptRejectController@del_img');
        Route::get('/del_content','admin\ReceiptRejectController@del_content');

        //Route::get('/zip','admin\ReceiptAppController@zipFiles');
    });

    Route::group(['prefix'=>'/member/'], function(){
        Route::get('/index','admin\MemberController@index');
        Route::get('/zip','admin\MemberController@zipFiles');
    });
    Route::group(['prefix'=>'/export/'], function(){
        Route::get('/index','admin\ExportController@index');
        Route::get('/zip','admin\ExportController@zipFiles');
    });


     Route::group(['prefix'=>'/setting/'], function(){
        Route::get('/index','admin\SettingController@index');

        Route::post('/update','admin\SettingController@edit');

     });

});
