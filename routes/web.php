<?php


use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserGroupsController;
use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\UserPurchasesController;
use App\Http\Controllers\UserReceiptsController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UsersRecorcdsController;
use App\Http\Controllers\UsersRecordsController;
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


// Auth routes
// Route::get('login', function () {
//     return view('auth.login');
// });
Route::get('/', function () {
    return view('main');
});

Route::get('login',                         [LoginController::class, 'login'])->name('login');
Route::post('login/authenticate',           [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('registration',                  [RegistrationController::class, 'registration'])->name('registration');
Route::post('register/user',                [RegistrationController::class, 'registerUser'])->name('register.user');

Route::group(['middleware' => 'auth'], function(){

Route::get('dashboard',                     [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('logout',                        [LoginController::class, 'logOut'])->name('logout');

// Group Routes
Route::get('users/details/groups',                        [UserGroupsController::class, 'index'])->name('index.user.group');
Route::get('users/create-group',                  [UserGroupsController::class, 'create'])->name('create.user.group');
Route::post('users/create-group',                 [UserGroupsController::class, 'store'])->name('store.user.group');
Route::get('users/group/edit/{id}',               [UserGroupsController::class, 'edit'])->name('edit.user.group');
Route::post('users/group/update/{id}',            [UserGroupsController::class, 'update'])->name('update.user.group');
Route::get('users/group/delete/{id}',             [UserGroupsController::class, 'destroy'])->name('destroy.user.group');

// User Routes
Route::get('users/details/user',                 [UsersController::class, 'index'])->name('users.index');
Route::get('users/details/user/records',         [UsersController::class, 'records'])->name('users.records');
Route::get('users/details/show/{id}',               [UsersController::class, 'show'])->name('users.show');
Route::get('users/details/user/create',          [UsersController::class, 'create'])->name('users.create');
Route::post('users/store',                  [UsersController::class, 'store'])->name('users.store');
Route::get('users/details/edit/{id}',               [UsersController::class, 'edit'])->name('users.edit');
Route::post('users/details/update/{id}',            [UsersController::class, 'update'])->name('users.update');
Route::get('users/details/delete/{id}',             [UsersController::class, 'destroy'])->name('users.destroy');


// Categories Routes
Route::get('products/categories',                    [CategoriesController::class, 'index'])->name('categories.index');
Route::get('products/categories/create',             [CategoriesController::class, 'create'])->name('categories.create');
Route::post('products/categories/store',             [CategoriesController::class, 'store'])->name('categories.store');
Route::get('products/categories/edit/{id}',          [CategoriesController::class, 'edit'])->name('categories.edit');
Route::post('products/categories/update/{id}',       [CategoriesController::class, 'update'])->name('categories.update');
Route::get('products/categories/delete/{id}',        [CategoriesController::class, 'destroy'])->name('categories.delete');

// Products routes
Route::get('products',                      [ProductsController::class, 'index'])->name('products.index');
Route::get('products/show/{id}',            [ProductsController::class, 'show'])->name('products.show');
Route::get('products/create',               [ProductsController::class, 'create'])->name('products.create');
Route::post('products/store',               [ProductsController::class, 'store'])->name('products.store');
Route::get('products/edit/{id}',            [ProductsController::class, 'edit'])->name('products.edit');
Route::post('products/update/{id}',         [ProductsController::class, 'update'])->name('products.update');
Route::get('products/delete/{id}',          [ProductsController::class, 'destroy'])->name('products.delete');


// User sales routes
Route::get('user/details/{id}/sales',                                       [UserSalesController::class, 'index'])->name('user.sales');
Route::post('user/details/{id}/invoice',                                    [UserSalesController::class, 'createInvoice'])->name('user.sales.invoice.store');
Route::get('user/details/{id}/invoice/{invoice_id}/show',                   [UserSalesController::class, 'showInvoice'])->name('user.sales.invoice.show');
Route::post('user/details/{id}/invoice/{invoice_id}/add-item',              [UserSalesController::class, 'addItem'])->name('user.sales.invoice.addItem');
Route::get('user/details/{id}/invoice/{invoice_id}/delete/{item_id}',       [UserSalesController::class, 'removeItem'])->name('user.sales.invoice.item.delete');
Route::get('user/details/{id}/invoice/{invoice_id}',                        [UserSalesController::class, 'destroy'])->name('user.sales.invoice.delete');

// User Purchases routes
Route::get('user/details/{id}/purchases',                                   [UserPurchasesController::class, 'index'])->name('user.purchase');
Route::post('user/details/{id}/purchase',                                   [UserPurchasesController::class, 'createInvoice'])->name('user.purchase.invoice.store');
Route::get('user/details/{id}/purchase/{invoice_id}/show',                  [UserPurchasesController::class, 'showInvoice'])->name('user.purchase.invoice.show');
Route::post('user/details/{id}/purchase/{invoice_id}/add-item',             [UserPurchasesController::class, 'addItem'])->name('user.purchase.invoice.addItem');
Route::get('user/details/{id}/purchase/{invoice_id}/delete/{item_id}',      [UserPurchasesController::class, 'removeItem'])->name('user.purchase.invoice.item.delete');
Route::get('user/details/{id}/purchase/{invoice_id}',                       [UserPurchasesController::class, 'destroy'])->name('user.purchase.invoice.delete');

//User Receipts
Route::get('user/details/{id}/receipts',                                    [UserReceiptsController::class, 'index'])->name('user.receipts');
Route::post('user/details/{id}/receipts/store/{invoice_id?}',               [UserReceiptsController::class, 'store'])->name('user.receipts.store');
Route::get('user/details/{id}/receipts/{receipt_id}',                       [UserReceiptsController::class, 'destroy'])->name('user.receipts.delete');

// User Payments
Route::get('user/details/{id}/payments',                                    [UserPaymentsController::class, 'index'])->name('user.payments');
Route::post('user/details/{id}/payments/store/{invoice_id?}',               [UserPaymentsController::class, 'store'])->name('user.payments.store');
Route::get('user/details/{id}/payments/{payment_id}',                       [UserPaymentsController::class, 'destroy'])->name('user.payments.delete');

// Stock route
Route::get('products/stock',                                         [ProductStockController::class, 'index'])->name('products.stock');

// Reports route
Route::get('reports/reports-overview',                              [ReportsController::class, 'reportsOverView'])->name('sales.reports.over-view');
Route::get('reports/sales',                                         [ReportsController::class, 'salesReport'])->name('sales.reports');
Route::get('reports/purchases',                                     [ReportsController::class, 'purchasesReport'])->name('purchases.reports');
Route::get('reports/payments',                                      [ReportsController::class, 'paymentsReport'])->name('payments.reports');
Route::get('reports/receipts',                                      [ReportsController::class, 'receiptsReport'])->name('receipts.reports');


// search routes
Route::get('users/information/search',                              [SearchController::class, 'searchInformation'])->name('users.search.information');
Route::get('users/records/search',                                  [SearchController::class, 'searchRecords'])->name('users.search.records');


});





