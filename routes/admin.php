<?php

Route::prefix('/admin')->group(function()
{
	Route::get('/', 'Admin\DashboardController@getDashboard')->name('dashboard');

	//Module Users
	Route::get('/users','Admin\UserController@getUsers')->name('user_list');
	Route::get('/users/{id}/edit','Admin\UserController@getUserEdit')->name('user_edit');

	//Module Products
	Route::get('/products','Admin\ProductController@getHome')->name('products');
	Route::get('/products/add','Admin\ProductController@getProductAdd')->name('products_add');
	Route::get('/products/{id}/edit','Admin\ProductController@getProductEdit')->name('products_edit');
	Route::post('/products/add','Admin\ProductController@postProductAdd')->name('products_add');
	Route::post('/products/{id}/edit','Admin\ProductController@postProductEdit')->name('products_edit');
	Route::post('/products/{id}/gallery/add','Admin\ProductController@postProductGalleryAdd')->name('products_gallery_add');
	Route::get('/products/{id}/gallery/{gid}/delete','Admin\ProductController@getProductGalleryDelete')->name('products_gallery_delete');

	//Categories
	Route::get('/categories/{module}','Admin\CategoriesController@getHome')->name('categories');
	Route::post('/category/add','Admin\CategoriesController@postCategoryAdd')->name('category_add');
	Route::get('/category/{id}/edit','Admin\CategoriesController@getCategoryEdit')->name('category_edit');
	Route::post('/category/{id}/edit','Admin\CategoriesController@postCategoryEdit')->name('category_edit');
	Route::get('/category/{id}/delete','Admin\CategoriesController@getCategoryDelete')->name('category_delete');
});
