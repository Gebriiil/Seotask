<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middlew
*/
Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
function()
{
	Route::get('register','UserController@register_page');
	Route::post('sign-up','UserController@register');
	Route::get('login','UserController@login_page')->name('login');
	Route::post('dologin','UserController@dologin');
	Route::get('send',function(){
		Mail::to('php@exanple.com')->send(new \App\Mail\Registermail('bbbbbbbbbb'));
		return 'done';
	});
	Route::get('verify/{token}','UserController@verify');

	Route::group(['middleware'=>'auth'] , function() {
		Route::get('home','FrontController@home');
		Route::get('logout','UserController@logout');
	});



});
