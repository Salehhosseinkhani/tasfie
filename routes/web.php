<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GhtaatController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\YakhchalController;
use App\Http\Controllers\SardController;
use App\Http\Controllers\BackgroundController;
use App\Http\Controllers\AdminJashnvareController;
use App\Http\Controllers\MghaletowController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleTowController;
use App\Http\Controllers\DigiAdminLoginController;


use App\Models\Addproduct;




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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [ProductController::class, 'index'])->name('products.index'); // صفحه welcome
Route::get('/digiadmin', [ProductController::class, 'create'])->name('products.create'); // صفحه digiadmin
Route::post('/products', [ProductController::class, 'store'])->name('products.store'); // ذخیره محصول
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy'); // حذف محصول

// ///////////////////////////////


Route::get('/ghtaat', [GhtaatController::class, 'index'])->name('ghtaats.index');
Route::get('/adminghtaat', [GhtaatController::class, 'create'])->name('ghtaats.create'); 
Route::post('/ghtaats', [GhtaatController::class, 'store'])->name('ghtaats.store'); 
Route::delete('/ghtaats/{id}', [GhtaatController::class, 'destroy'])->name('ghtaats.destroy'); 
Route::get('/ghtaat/{slug}', [GhtaatController::class, 'add'])->name('ghtaat.add');


// ///////////////////////
Route::get('/filter', [FilterController::class, 'index'])->name('filters.index');
Route::get('/adminfilter', [FilterController::class, 'create'])->name('filters.create');
Route::post('/filter', [FilterController::class, 'store'])->name('filters.store'); 
Route::delete('/filters/{id}', [FilterController::class, 'destroy'])->name('filters.destroy');
Route::get('/filter/{slug}', [FilterController::class, 'new'])->name('filter.new');


// /////////////////////////

Route::get('/yakhchal', [YakhchalController::class, 'index'])->name('yakhchals.index');
Route::get('/adminyakhchal', [YakhchalController::class, 'create'])->name('yakhchals.create');
Route::post('/yakhchals', [YakhchalController::class, 'store'])->name('yakhchals.store'); 
Route::delete('/yakhchals/{id}', [YakhchalController::class, 'destroy'])->name('yakhchals.destroy');
Route::get('/yakhchal/{slug}', [YakhchalController::class, 'one'])->name('yakhchal.one');


// //////////////////////////////

Route::get('/sard', [SardController::class, 'index'])->name('sards.index');
Route::get('/adminsard', [SardController::class, 'create'])->name('sards.create');
Route::post('/sards', [SardController::class, 'store'])->name('sards.store'); 
Route::delete('/sards/{id}', [SardController::class, 'destroy'])->name('sards.destroy');
Route::get('/sard/{slug}', [SardController::class, 'tow'])->name('sard.tow');

// /////////////////////////////////



Route::group(['prefix' => 'digi'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/add', function () {
    return view('add');
});

// Route::get('/filter', function () {
//     return view('filter');
// });

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');




Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');







Route::get('/form', [FormController::class, 'showForm'])->name('showForm');
Route::post('/submit-form', [FormController::class, 'submitForm'])->name('submitForm');
Route::get('/adminsupport', [FormController::class, 'showDigiAdmin'])->name('showDigiAdmin');



// Route::get('/adminorder', [OrderController::class, 'showOrders'])->name('adminorder');

Route::get('/adminorder', [OrderController::class, 'index'])->name('adminorder');

Route::post('/order/submit', [OrderController::class, 'submit'])->name('order.submit');




Route::get('/adminbackground', function () {
    return view('adminbackground');
});

Route::post('/save-background', [BackgroundController::class, 'store'])->name('background.store');


Route::get('/adminjashnvare', function () {
    return view('adminjashnvare');
});

Route::post('/admin/jashnvare/store', [AdminJashnvareController::class, 'store'])->name('admin.jashnvare.store');

Route::get('/mghaleone', function () {
    return view('mghaleone');
});

Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');









// //////////////////////////////////////

