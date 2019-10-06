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

//--------------------------------------- Auth Routes --------------------------//

use App\GeneralUser;

Auth::routes();


//--------------------------------------- Frontend Routes --------------------------//

Route::get('/', 'FrontendController@index')->name('Home');
Route::get('about', 'FrontendController@about')->name('About');
Route::get('service', 'FrontendController@service')->name('Service');
Route::get('contact', 'FrontendController@contact')->name('Contact');


//--------------------------------------- Files & Message Sharing Routes --------------------------//

Route::get('inbox','FileShareController@index')->name('inbox');
Route::post('fileStore', 'FileShareController@fileStore')->name('fileStore');
Route::resource('message', 'MessageController');


Route::get('markAsReadUser/{id}',function ($id){
   GeneralUser::find($id)->unreadNotifications->markAsRead();
   return redirect()->back();
})->name('markAsReadUser');

Route::get('markAsRead',function (){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
});


//--------------------------------------- General Users Login/Register Routes --------------------------//

Route::get('/loginPage', 'UserController@index')->name('loginPage');
Route::post('store', 'UserController@store')->name('store');
Route::post('authenticate', 'UserController@authenticate')->name('authenticate');
Route::get('logOut', 'UserController@logOut')->name('logOut');
Route::get('password-reset', 'PasswordResetController@showForm')->name('emailSubmitPage');
Route::post('sendPasswordResetToken', 'PasswordResetController@sendPasswordResetToken')->name('sendPasswordResetToken');
Route::get('showPasswordResetForm/{token}', 'PasswordResetController@showPasswordResetForm')->name('showPasswordResetForm');
Route::post('resetPassword/{token}', 'PasswordResetController@resetPassword')->name('resetPassword');


//--------------------------------------- Admin Routes --------------------------//


Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'Admin'],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('generalUser','GeneralUserController@index')->name('users');
    Route::get('deleteUser/{id}','GeneralUserController@deleteUser')->name('deleteUser');
    Route::get('allFileDelete/{id}','GeneralUserController@allFileDelete')->name('allFileDelete');
    Route::resource('shareFile','FileShareController');
    Route::get('autoComplete','AutocompleteController@search')->name('autoComplete');
    Route::resource('UserMessage','UserMessageController');
});
