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

//web
Route::get('/', function () {
	return view('index'); 
})->name('welcome');


Route::get('/checkout', function () {
	return view('checkout'); 
})->name('checkout');


Route::get('/confirmation', function () {
	return view('confirmation'); 
})->name('confirmation');


Route::get('/dashboard', function () {
	return view('dashboard');
	 })->name('dashboard');

Route::get('/home', function () {
	return view('home'); 
})->name('home');

Route::get('/loginweb', function () {
	return redirect('login');
	 })->name('login');



Route::get('/product-single', function () {
	return view('product-single'); 
})->name('product-single');


Route::get('/shop', function () {
	return view('shop'); 
})->name('shop');

Route::get('/signin', function () {
	return view('signin'); 
})->name('signin');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//category
Route::get('/category', [App\Http\Controllers\HomeController::class, 'indexCategory']);
Route::get('/category_delete/{id}', [App\Http\Controllers\HomeController::class, 'deleteCategory']);
Route::get('/category_edit/{id}', [App\Http\Controllers\HomeController::class, 'indexCategoryEdit']);
Route::post('category_create',[App\Http\Controllers\HomeController::class, 'createCategory']);
Route::post('category_update/{id}',[App\Http\Controllers\HomeController::class, 'updateCategory']);
//product
Route::get('/product', [App\Http\Controllers\HomeController::class, 'indexProduct']);
Route::get('/product_delete/{id}', [App\Http\Controllers\HomeController::class, 'deleteProduct']);
Route::get('/product_edit/{id}', [App\Http\Controllers\HomeController::class, 'indexProductEdit']);
Route::post('product_create',[App\Http\Controllers\HomeController::class, 'createProduct']);
Route::post('product_update/{id}',[App\Http\Controllers\HomeController::class, 'updateProduct']);
//homes
Route::post('update_homes',[App\Http\Controllers\HomeController::class, 'updateHome']);
//profile
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'indexProfile']);
Route::post('profile_update',[App\Http\Controllers\HomeController::class, 'updateProfile']);
//transaction
Route::get('/order', [App\Http\Controllers\HomeController::class, 'indexTransactionUser']);
Route::get('/transaction', [App\Http\Controllers\HomeController::class, 'indexTransactionAdmin']);
Route::get('/transaction_act/{id}/{act}', [App\Http\Controllers\HomeController::class, 'actTransaction']);
Route::post('/transaction_add', [App\Http\Controllers\HomeController::class, 'cerateTransaction']);
Route::post('/up_image', [App\Http\Controllers\HomeController::class, 'up_image']);
Route::get('/transaction_pdf/{id}', [App\Http\Controllers\HomeController::class, 'print_pdf_invoice']);
//product user
Route::get('/product-single/{id}', [App\Http\Controllers\HomeController::class, 'detailProduct']);
Route::get('/add-to-cart/{id}', [App\Http\Controllers\HomeController::class, 'addToCart']);
Route::get('/remove-to-cart/{id}', [App\Http\Controllers\HomeController::class, 'removeCart']);
Route::get('/carts', [App\Http\Controllers\HomeController::class, 'cartUser']);

