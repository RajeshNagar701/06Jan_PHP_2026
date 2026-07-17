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
    return view('website.index');
});

Route::get('/index', function () {
    return view('website.index');
});

Route::get('/category', function () {
    return view('website.category');
});

Route::get('/listing', function () {
    return view('website.listing');
});

Route::get('/contact', function () {
    return view('website.contact');
});

//============ admin ==================================================================

Route::get('/admin-login', function () {
    return view('admin.admin_login');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/add_category', function () {
    return view('admin.add_category');
});

Route::get('/manage_category', function () {
    return view('admin.manage_category');
});