<?php 

Route::group([
	'as' => 'litepie',
	'namespace' => config('litepie.controllers.namespace'),
], function(){
		Route::get('/', 'LitepieController@index');
		Route::get('category/{slug}', 'LitepieController@category');
		Route::get('{any}', 'LitepieController@any');
		Route::get('search/{q?}', 'LitepieController@searching');
});