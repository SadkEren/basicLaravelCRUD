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

Route::get('book/edit/{id}', [IndexController::class, 'getBookEdit'])->name('get_BookEdit');

Route::post('book/edit', [IndexController::class, 'postBookEdit'])->name('postBookEdit');



// Route::get('ekle', function(){
//     return view('ekle');
// });

Route::get('/ekle',[IndexController::class, 'yolla'])->name('');

Route::post('ekle/kitap',[IndexController::class, 'ekle']);

Route::get('/edit/{id}',[IndexController::class, 'edit']);

Route::resource('user', UserController::class);
