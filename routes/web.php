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

// Route::get('users', function () {
//     return view('users.users');
// });

Route::get('users', [UsersController::class, 'index']);
Route::get('groups', [UserGroupsController::class, 'index']);
Route::get('create-group', [UserGroupsController::class, 'create'])->name('create.user.group');
Route::post('create-group', [UserGroupsController::class, 'store'])->name('store.user.group');



