<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
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

Route::get('/signup', [CustomerController::class, 'create'])->middleware('web_before');
Route::post('/submit-customer', [CustomerController::class, 'store'])->middleware('web_before');

Route::get('/login', [CustomerController::class, 'login'])->middleware('web_before');
Route::post('/submit-auth', [CustomerController::class, 'auth'])->middleware('web_before');

Route::get('/user_logout', [CustomerController::class, 'user_logout'])->middleware('web_after');
Route::get('/user_profile', [CustomerController::class, 'user_profile'])->middleware('web_after');
Route::get('/user_profile/{id}', [CustomerController::class, 'edit'])->middleware('web_after');
Route::post('/update-customer/{id}', [CustomerController::class, 'update'])->middleware('web_after');

Route::get('/contact', [ContactController::class, 'create']);
Route::post('/submit-contact', [ContactController::class, 'store']);

//============ admin ==================================================================



Route::group(['middleware'=>['admin_before']],function(){
	
	Route::get('/admin-login', [AdminController::class, 'login']);
	Route::post('/admin-auth', [AdminController::class, 'auth']);

});

Route::group(['middleware'=>['admin_after']],function(){

	Route::get('/admin_logout', [AdminController::class, 'admin_logout']);
	Route::get('/dashboard', function () {
		return view('admin.dashboard');
	});
	Route::get('/add_category', [CategoryController::class, 'create']);
	Route::post('/submit-category', [CategoryController::class, 'store']);

	Route::get('/manage_category', [CategoryController::class, 'show']);
	Route::get('/delete_category/{id}', [CategoryController::class, 'destroy']);

	Route::get('/manage_contact', [ContactController::class, 'show']);
	Route::get('/delete_contact/{id}', [ContactController::class, 'destroy']);

	Route::get('/manage_customer', [CustomerController::class, 'show']);
	Route::get('/delete_customer/{id}', [CustomerController::class, 'destroy']);
	Route::get('/status_customer/{id}', [CustomerController::class, 'status_customer']);
	
});