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
Route::get('create-group/edit/{id}', [UserGroupsController::class, 'edit'])->name('edit.user.group');
Route::post('create-group/update/{id}', [UserGroupsController::class, 'update'])->name('update.user.group');
Route::get('create-group/delete/{id}', [UserGroupsController::class, 'destroy'])->name('destroy.user.group');

Route::resource('users', UsersController::class);



