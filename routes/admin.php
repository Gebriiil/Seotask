<?php



Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
function()
{
	
	Route::group(['prefix'=>'admin-panel'],function(){
		\Config::set('auth.defines','admin');
			Route::get('login','AdminAuth@login');
			Route::post('dologin','AdminAuth@dologin');		
		Route::group(['middleware'=>'admin:admin'],function(){
			Route::any('logout','AdminAuth@logout');
			Route::get('admin/edit','AdminController@edit');
			Route::put('admin/update','AdminController@update');
			Route::get('index',function(){
				return view('admin.index');
			});
			Route::get('admins/api','AdminAuth@admins_api')->name('admin.api');
			Route::get('admins','AdminAuth@admins');
			Route::get('admin/create','AdminAuth@create_admins');
			Route::post('admin/add','AdminAuth@add_admins');
			Route::get('admin/edit/{id}','AdminAuth@edit_admins');
			Route::put('admin/{id}/update','AdminAuth@update_admins');
			Route::get('languages','LanguageController@languages');
			Route::get('languages/api','LanguageController@language_api')->name('languages.api');
			Route::get('languages/create','LanguageController@create_languages');
			Route::post('languages/add','LanguageController@add_languages');
			Route::get('languages/edit/{id}','LanguageController@edit_languages');
			Route::put('languages/update/{id}','LanguageController@update_languages');
			Route::get('languages/delete/{id}','LanguageController@delete_languages');
			Route::get('products','ProductController@products');
			Route::get('products/create','ProductController@create_products');
			Route::post('products/add','ProductController@add_products');
			Route::get('products/api','ProductController@product_api')->name('products.api');
			Route::get('products/edit/{id}','ProductController@edit_products');
			Route::put('products/update/{id}','ProductController@update_products');
			Route::get('products/delete/{id}','ProductController@delete_products');
			Route::get('users/api','AdminAuth@users_api')->name('users.api');
			Route::get('users','AdminAuth@users');
			Route::get('user/deactivate/{id}','AdminAuth@user_deactivate');
			Route::get('user/activate/{id}','AdminAuth@user_activate');
		});
	});
});
	




// <IfModule mod_rewrite.c>
//    RewriteEngine On 
//    RewriteRule ^(.*)$ public/$1 [L]
// </IfModule>

?>