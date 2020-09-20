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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');
Route::resource('products', 'ProductsController');

Route::resource('members', 'MemberController');
Route::resource('collections', 'CollectionController');
Route::get('new-collection/{id}', 'CollectionController@make_new');

Route::get('reports', 'ReportController@index');
Route::post('reports-bydate', 'ReportController@reports_by_date');
Route::post('reports-byyear', 'ReportController@reports_by_year');
Route::post('reports-by-member', 'ReportController@reports_by_member');
Route::post('reports-by-month', 'ReportController@member_report_by_month');
Route::get('get-all-members', 'ReportController@get_all_members');
Route::get('invoice/{id}', 'ReportController@invoice');

