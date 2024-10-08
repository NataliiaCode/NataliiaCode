<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MainController::class, 'index'])->name('home');





// обробити форму
Route::get('contacts-us', [MainController::class, 'contacts'])->name('contacts');
Route::post('contacts-us', [MainController::class, 'sendEmail'])->name('sendEmail');

Route::get('registration', [MainController::class, 'registration'])->name('registration');
Route::post('registration', [MainController::class, 'register'])->name('register');


Route::get('news', [NewsController::class, 'index'])->name('news');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');


// Додаємо маршрут для перегляду детальної інформації про відгук
Route::get('/reviews', [ReviewController::class, 'show'])->name('reviews.show');

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');


// Деталі про тур
Route::get('/tours/{tour}', [TourController::class, 'show'])->name('tour.show');



Route::resource('admin/categories', CategoryController::class)->middleware('auth');

Route::resource('admin/tours', TourController::class)->middleware('auth');



Route::resource('admin/reviews', ReviewController::class)->middleware('auth');

Auth::routes();
