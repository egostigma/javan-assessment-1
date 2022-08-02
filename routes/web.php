<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamilyMemberController;
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

Route::controller(FamilyMemberController::class)->as('family-member.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{member}/edit', 'edit')->name('edit');
    Route::put('/{member}/update', 'update')->name('update');
    Route::delete('/{member}/delete', 'destroy')->name('destroy');
    Route::get('/{member}', 'show')->name('show');
});
