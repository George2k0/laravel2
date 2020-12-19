<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/companies/all', '\App\Http\Controllers\CompaniesController@viewAllCompanies')->name('companies.all');
Route::get('/', '\App\Http\Controllers\CompaniesController@viewAllCompanies')->name('companies.all');
Route::post('/companies/add', '\App\Http\Controllers\CompaniesController@addNewCompany')->name('companies.add');
Route::post('/companies/delete', '\App\Http\Controllers\CompaniesController@deleteCompany')->name('companies.delete');
Route::get('/companies/edit/{id}', '\App\Http\Controllers\CompaniesController@editCompany')->name('companies.edit');
Route::post('/companies/update/{id}', '\App\Http\Controllers\CompaniesController@updateCompany')->name('companies.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/custom/register', [App\Http\Controllers\AuthorizationController::class, 'register'])->name('auth.custom.register');
Route::post('/custom/login', [App\Http\Controllers\AuthorizationController::class, 'login'])->name('auth.custom.login');
Route::post('/custom/logout', [App\Http\Controllers\AuthorizationController::class, 'logout'])->name('auth.custom.logout');