<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserGroupsController;
use App\Http\Controllers\UsersController;
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

Route::group(['middleware' => 'auth'], function(){
    Route::get('dashboard', function () {
        return view('welcome');
    });

    // Auth routes
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::get('login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');

    // Group Routes
    Route::get('groups', [UserGroupsController::class, 'index'])->name('index.user.group');
    Route::get('create-group', [UserGroupsController::class, 'create'])->name('create.user.group');
    Route::post('create-group', [UserGroupsController::class, 'store'])->name('store.user.group');
    Route::get('group/edit/{id}', [UserGroupsController::class, 'edit'])->name('edit.user.group');
    Route::post('group/update/{id}', [UserGroupsController::class, 'update'])->name('update.user.group');
    Route::get('group/delete/{id}', [UserGroupsController::class, 'destroy'])->name('destroy.user.group');

    // User Routes
    Route::get('users', [UsersController::class, 'index'])->name('users.index');
    Route::get('users/show/{id}', [UsersController::class, 'show'])->name('users.show');
    Route::get('users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('users/store', [UsersController::class, 'store'])->name('users.store');
    Route::get('users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::post('users/update/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::get('users/delete/{id}', [UsersController::class, 'destroy'])->name('users.destroy');

    // Categories Routes
    Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('categories/store', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::post('categories/update/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::get('categories/delete/{id}', [CategoriesController::class, 'destroy'])->name('categories.delete');

    // Products routes
    Route::get('products', [ProductsController::class, 'index'])->name('products.index');
    Route::get('products/show/{id}', [ProductsController::class, 'show'])->name('products.show');
    Route::get('products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('products/store', [ProductsController::class, 'store'])->name('products.store');
    Route::get('products/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
    Route::post('products/update/{id}', [ProductsController::class, 'update'])->name('products.update');
    Route::get('products/delete/{id}', [ProductsController::class, 'destroy'])->name('products.delete');
});




