<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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

Route::get('/',[IndexController::class, 'getIndex'])->name('index');

Route::post('book/store',[IndexController::class, 'postBook'])->name('post_book');  //book/store form actionda yolladığı ad! Route onu ordan tanıyıp işlemin gerçeklştiği kısıma yolluyor.

Route::get('book/delete/{id}' ,[IndexController::class, 'bookDelete'])->name('bookDelete');

Route::get('book/edit/{id}', [IndexController::class, 'getBookEdit'])->name('getBookEdit');
