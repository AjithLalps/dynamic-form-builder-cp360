<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FormController;
use App\Http\Controllers\FormListingController;

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

Auth::routes(['register' => false]);

Route::middleware('auth')
    ->resource('form', FormController::class)
    ->except('show');

Route::get('/', [FormListingController::class, 'index'])->name('forms.index');
Route::get('/forms/{code}', [FormListingController::class, 'show'])->name('forms.show');