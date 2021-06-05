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

Route::get('/', function () {
    return view('home.index');
})->name('house');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('initialize',function ()
{
        $user = new \App\User();
        $user->name = 'admin';
        $user->password = \Illuminate\Support\Facades\Hash::make('password');
        $user->email = 'admin@admin.com';
        $user->save();
});

Route::get('admin-home','AdminDashboardController@index')->name('admin.home');
Route::get('admin-user','AdminDashboardController@userShow')->name('admin.user.show');

//Brand

Route::get('brand-table','BrandController@tableShow')->name('admin.table.show');
Route::post('store-brand','BrandController@store')->name('admin.brand.store');
Route::post('delete-bulk','BrandController@bulkDelete')->name('brand.bulk.delete');
Route::put('brand-update/{id}','BrandController@update')->name('brand.update');
Route::get('brand-edit/{id}','BrandController@edit')->name('brand.edit');

//Category
Route::get('category-table','AdminCategoryController@tableShow')->name('admin.category.show');
Route::post('store-category','AdminCategoryController@store')->name('admin.category.store');
Route::post('category-delete-bulk','AdminCategoryController@bulkDelete')->name('category.bulk.delete');
Route::put('category-update/{id}','AdminCategoryController@update')->name('category.update');
Route::get('category-edit/{id}','AdminCategoryController@edit')->name('category.edit');

//Items
Route::get('item-table','AdminItemController@tableShow')->name('admin.item.show');
Route::post('store-item','AdminItemController@store')->name('admin.item.store');
Route::post('item-delete-bulk','AdminItemController@bulkDelete')->name('item.bulk.delete');
Route::get('item-edit/{id}','AdminItemController@edit')->name('item.edit');
Route::put('item-update/{id}','AdminItemController@update')->name('item.update');
Route::get('item-history/{id}','AdminItemController@history')->name('item.history');