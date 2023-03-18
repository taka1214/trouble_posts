<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TroublePostController;
use App\Http\Controllers\ReplyController;

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

Route::resource('posts', TroublePostController::class);

Route::get('/replies', [ReplyController::class, 'index'])->name('replies.index');
Route::get('/replies/create/{troublePost}', [ReplyController::class, 'create'])->name('replies.create');
Route::post('/replies', [ReplyController::class, 'store'])->name('replies.store');

// Route::resource('replies', ReplyController::class);

Route::get('/', function () {
    return view('welcome');
});
