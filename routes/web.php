<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SalesDetailsController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\PrinterController;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ReportController;




/*
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
// Route::middleware(['cors'])->group(function () {
//     Route::get('categories',[CategoryController::class, 'index']);
// });

Route::get('/', function() {
    return redirect()->route('login');
});

//Route::get('categories',[CategoryController::class, 'index']);

 Route::prefix('categories')->group(function(){
     Route::get('/', [CategoryController::class, 'index'])->name('categories.index');

    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');

    Route::get('/editar/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/actualizar/{category}', [CategoryController::class, 'update'])->name('categories.update');

    Route::get('/eliminar/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::delete('/destruir/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

});
Route::prefix('providers')->group(function(){
    Route::get('/', [ProviderController::class, 'index'])->name('providers.index');

   Route::get('/create', [ProviderController::class, 'create'])->name('providers.create');
   Route::post('/store', [ProviderController::class, 'store'])->name('providers.store');

   Route::get('/editar/{provider}', [ProviderController::class, 'edit'])->name('providers.edit');
   Route::put('/actualizar/{provider}', [ProviderController::class, 'update'])->name('providers.update');

   Route::get('/eliminar/{provider}', [ProviderController::class, 'show'])->name('providers.show');
   Route::delete('/destruir/{provider}', [ProviderController::class, 'destroy'])->name('providers.destroy');

});
Route::prefix('products')->group(function(){
    Route::get('/', [ProductController::class, 'index'])->name('products.index');

   Route::get('/create', [ProductController::class, 'create'])->name('products.create');
   Route::post('/store', [ProductController::class, 'store'])->name('products.store');

   Route::get('/editar/{product}', [ProductController::class, 'edit'])->name('products.edit');
   Route::put('/actualizar/{product}', [ProductController::class, 'update'])->name('products.update');

   Route::get('/ver/{product}', [ProductController::class, 'show'])->name('products.show');
   Route::delete('/destruir/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

   Route::get('/pdf/{product}', [ProductController::class, 'pdf'])->name('products.pdf');
   Route::get('/change_status/products/{product}', [ProductController::class,'change_status'])->name('change.status.products');

   Route::get('/get_products_by_id',[ProductController::class, 'get_products_by_id'])->name('get_products_by_id');
});

Route::prefix('clients')->group(function(){
    Route::get('/', [ClientController::class, 'index'])->name('clients.index');

   Route::get('/create', [ClientController::class, 'create'])->name('clients.create');
   Route::post('/store', [ClientController::class, 'store'])->name('clients.store');

   Route::get('/editar/{client}', [ClientController::class, 'edit'])->name('clients.edit');
   Route::put('/actualizar/{client}', [ClientController::class, 'update'])->name('clients.update');

   Route::get('/ver/{client}', [ClientController::class, 'show'])->name('clients.show');
   Route::delete('/destruir/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

});

Route::prefix('purchases')->group(function(){
    Route::get('/', [PurchaseController::class, 'index'])->name('purchases.index');

   Route::get('/create', [PurchaseController::class, 'create'])->name('purchases.create');
   Route::post('/store', [PurchaseController::class, 'store'])->name('purchases.store');

   Route::get('/editar/{purchase}', [PurchaseController::class, 'edit'])->name('purchases.edit');
   Route::put('/actualizar/{purchase}', [PurchaseController::class, 'update'])->name('purchases.update');

   Route::get('/ver/{purchase}', [PurchaseController::class, 'show'])->name('purchases.show');
   Route::delete('/destruir/{purchase}', [PurchaseController::class, 'destroy'])->name('purchases.destroy');

   Route::get('/pdf/{purchase}', [PurchaseController::class, 'pdf'])->name('purchases.pdf');
   Route::get('/change_status/purchases/{purchase}', [PurchaseController::class,'change_status'])->name('change.status.purchases');

});
//sales - ventas
Route::prefix('sales')->group(function(){
    Route::get('/', [SaleController::class, 'index'])->name('sales.index');

   Route::get('/create', [SaleController::class, 'create'])->name('sales.create');
   Route::post('/store', [SaleController::class, 'store'])->name('sales.store');

   Route::get('/editar/{sale}', [SaleController::class, 'edit'])->name('sales.edit');
   Route::put('/actualizar/{sale}', [SaleController::class, 'update'])->name('sales.update');

   Route::get('/ver/{sale}', [SaleController::class, 'show'])->name('sales.show');
   Route::delete('/destruir/{sale}', [SaleController::class, 'destroy'])->name('sales.destroy');

   Route::get('/pdf/{sale}', [SaleController::class, 'pdf'])->name('sales.pdf');
   Route::get('/change_status/sales/{sale}', [SaleController::class,'change_status'])->name('change.status.sales');

   //reportes
   Route::get('/reports_day', [ReportController::class, 'reports_day'])->name('reports.day');
   Route::get('/reports_date', [ReportController::class, 'reports_date'])->name('reports.date');
   Route::post('/report_results', [ReportController::class, 'report_results'])->name('report.results');

});

//users
Route::prefix('users')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('users.index');

   Route::get('/create', [UserController::class, 'create'])->name('users.create');
   Route::post('/store', [UserController::class, 'store'])->name('users.store');

   Route::get('/editar/{id}', [UserController::class, 'edit'])->name('users.edit');
   Route::put('/actualizar/{id}', [UserController::class, 'update'])->name('users.update');

   Route::get('/ver/{user}', [UserController::class, 'show'])->name('users.show');
   Route::delete('/destruir/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});
//role
Route::prefix('roles')->group(function(){
    Route::get('/', [RoleController::class, 'index'])->name('roles.index');

   Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
   Route::post('/store', [RoleController::class, 'store'])->name('roles.store');

   Route::get('/editar/{id}', [RoleController::class, 'edit'])->name('roles.edit');
   Route::put('/actualizar/{id}', [RoleController::class, 'update'])->name('roles.update');

   Route::get('/ver/{role}', [RoleController::class, 'show'])->name('roles.show');
   Route::delete('/destruir/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
});



Route::prefix('business')->group(function(){
    Route::get('/', [BusinessController::class, 'index'])->name('business.index');
    Route::put('/actualizar/{business}', [BusinessController::class, 'update'])->name('business.update');

});

Route::prefix('printers')->group(function(){
    Route::get('/', [PrinterController::class, 'index'])->name('printers.index');

   Route::put('/actualizar/{printer}', [PrinterController::class, 'update'])->name('printers.update');

});


// Route::resource('categories', 'CategoryController')->names('categories');
// Route::resource('clients', 'ClientController')->names('clients');
// Route::resource('products', 'ProductController')->names('products');
// Route::resource('providers', 'ProviderController')->names('providers');
// Route::resource('purchases', 'PurchaseController')->names('purchases');
// Route::resource('sales', 'SaleController')->names('sales');

Route::get('/prueba', function () {
    return view('prueba');
});
//Route::get('change_status/products/{product}', 'ProductController@change_status')->name('change.status.products');

//Route::get('get_products_by_barcode', 'ProductController@get_products_by_barcode')->name('get_products_by_barcode');

Route::get('get_products_by_barcode',[ProductController::class, 'get_products_by_barcode'])->name('get_products_by_barcode');


//Route::get('get_products_by_id','ProductController@get_products_by_id')->name('get_products_by_id');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('change_status/purchases/{purchase}', 'PurchaseController@change_status')->name('change.status.purchases');

//Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchases.pdf');


Route::get('sales/print/{sale}', 'SaleController@print')->name('sales.print');

Route::get('sales/reports_day', [ReportController::class, 'reports_day'])->name('reports.day');
Route::get('sales/reports_date',[ReportController::class, 'reports_date'])->name('reports.date');

Route::post('sales/report_results', [ReportController::class, 'report_results'])->name('report.results');