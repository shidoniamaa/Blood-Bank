<?php

use Illuminate\Support\Facades\Auth;
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
Route::group(['namespace'=>'Front'
//    , 'middleware'=>'auth:client-web'
         ],function (){

    Route::get('/','MainController@home' )->name('home');
    Route::get('about','MainController@about' )->name('about');
    Route::post('toggle-favourite','MainController@toggleFavourite' )->name('toggle-favourite');
    Route::get('donation-request','MainController@donationRequest' )->name('donation-request');
    Route::get('request-details','MainController@donationDetails' )->name('request-details');
    Route::get('request-contact-us','MainController@contactUs' )->name('contact-us');
    Route::get('post-details','MainController@postDetails' )->name('post-details');
    Route::get('client-login','AuthController@login' )->name('client-login');
    Route::post('client-login-save','AuthController@loginSave' )->name('client-login-save');
    Route::get('client-register','AuthController@register' )->name('client-register');
    Route::post('client-register-save','AuthController@registerSave' )->name('client-register-save');

    });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['namespace' =>'Admin'],function(){

Route::get('home','AdminController@index');
Route::resource('category','CategoryController');
Route::resource('governorate','GovernorateController');
Route::resource('city','CityController');
Route::resource('post','PostController');
Route::resource('donation','DonationRequestController');
Route::resource('contact','ContactController');
Route::resource('setting','SettingController');



});


Route::group([
    'middleware'=>[
      //  'auth',
       // 'auto_check_permission'
    ],
    'namespace' =>'permission'],function(){
    Route::get('user/change-password','UserController@changPassword')->name('change-password');
    Route::post('user/change-password','UserController@changPasswordSave')->name('change-password-submit');

    Route::resource('roles','RoleController');
    Route::resource('users','UserController');




});
