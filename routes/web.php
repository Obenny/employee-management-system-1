<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();// consist of authentication access to all the pages or default pages
Auth::routes(['register' => false]);// disables register page

// home route
//Route::get('/home', 'HomeController@index')->name('home');
Auth::routes(['home' => false]);// disables home page


/*
 *  MY CONTROLLERS
 */

Route::get('/home', 'Home\MyHomeController@index')->name('myhome');

// company routes with users having to login to access any page through the auth middleware
Route::get('/companies/list', 'Companies\ListCompanies@index')->name('companies.list')->middleware('auth');
Route::get('/company/create', 'Companies\CreateCompany@create')->name('company.create')->middleware('auth');
Route::post('/company/store', 'Companies\StoreCompany@store')->name('company.store')->middleware('auth');
Route::get('/company/{id}/show', 'Companies\ShowCompany@show')->name('company.show')->middleware('auth');
Route::get('/company/{id}/edit', 'Companies\EditCompany@edit')->name('company.edit')->middleware('auth');
Route::put('/company/{id}/update', 'Companies\UpdateCompany@update')->name('company.update')->middleware('auth');
Route::get('/company/{id}/edit/logo', 'Companies\EditCompanyLogo@edit')->name('company.edit.logo')->middleware('auth');
Route::put('/company/{id}/update/logo', 'Companies\UpdateCompanyLogo@update')->name('company.update.logo')->middleware('auth');
Route::delete('/company/{id}/delete', 'Companies\DeleteCompany@destroy')->name('company.delete')->middleware('auth');


// employee routes with users having to login to access any page through the auth middleware
Route::get('/employees/list', 'Employees\ListEmployees@index')->name('employees.list')->middleware('auth');
Route::get('/employee/create', 'Employees\CreateEmployee@create')->name('employee.create')->middleware('auth');
Route::post('/employee/store', 'Employees\StoreEmployee@store')->name('employee.store')->middleware('auth');
Route::get('/employee/{id}/show', 'Employees\ShowEmployee@show')->name('employee.show')->middleware('auth');
Route::get('/employee/{id}/{did}/edit', 'Employees\EditEmployee@edit')->name('employee.edit')->middleware('auth');
Route::put('/employee/{id}/update', 'Employees\UpdateEmployee@update')->name('employee.update')->middleware('auth');
Route::delete('/employee/{id}/delete', 'Employees\DeleteEmployee@destroy')->name('employee.delete')->middleware('auth');
