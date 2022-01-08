<?php

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

Route::get('/', function () {
    return view('layouts.main-layout');
});



Route::get('groups', [UserGroupsController::class, 'index'])->name('index.user.group');
Route::get('create-group', [UserGroupsController::class, 'create'])->name('create.user.group');
Route::post('create-group', [UserGroupsController::class, 'store'])->name('store.user.group');
Route::get('group/edit/{id}', [UserGroupsController::class, 'edit'])->name('edit.user.group');
Route::post('group/update/{id}', [UserGroupsController::class, 'update'])->name('update.user.group');
Route::get('group/delete/{id}', [UserGroupsController::class, 'destroy'])->name('destroy.user.group');

Route::get('users', [UsersController::class, 'index'])->name('users.index');
Route::get('users/show/{id}', [UsersController::class, 'show'])->name('users.show');
Route::get('users/create', [UsersController::class, 'create'])->name('users.create');
Route::post('users/store', [UsersController::class, 'store'])->name('users.store');
Route::get('users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
Route::post('users/update/{id}', [UsersController::class, 'update'])->name('users.update');
Route::get('users/delete/{id}', [UsersController::class, 'destroy'])->name('users.destroy');



