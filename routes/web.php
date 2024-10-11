<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('site.home.index');
});

Route::get('/home',function(){
    return 'Home Page';
});

// Dynamic Routing
// Route::get('/products/{id}',function($id){
//     return "Product number {$id}";
// })->name("products.show");

// Dynamic Routing
Route::get('/eat/{snack?}', function ($snack = "kofta") {
    return "I'm Eating {$snack}";
})->name("eat.show");

Route::get('home', function () {
    return view('site.home.index');
})->name("home.index");

Route::get('about', function () {
    return view('site.about.index');
})->name("about.index");

Route::get('contact-us', function () {
    return view('site.contact.index');
})->name("contact.index");


Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
Route::post('/products',[ProductController::class,'store'])->name('products.store');
Route::get('/products/{product}/show', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}/update', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');


// Route::resource('products',[ProductController::class]);
