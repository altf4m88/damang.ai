<?php

use App\Http\Controllers\ChatController;
use App\Services\Chatbot;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//profiling
Route::get('/', ['App\Http\Controllers\ProfileController', 'index'])->name('profile');
Route::get('/create-profile', ['App\Http\Controllers\ProfileController', 'create'])->name('get-create-profile');
Route::post('/create-profile', ['App\Http\Controllers\ProfileController', 'store'])->name('post-create-profile');
Route::get('/create-medical-record/{id}', ['App\Http\Controllers\ProfileController', 'createMedicalRecord'])->name('get-create-medical-record');
Route::post('/create-medical-record/{id}', ['App\Http\Controllers\ProfileController', 'createPostMedicalRecord'])->name('post-create-medical-record');

Route::controller(ChatController::class)->group(function () {
    Route::prefix('users/{id}')
        ->group(function () {
        Route::prefix('chats/')
            ->group(function () {
                Route::get('/', 'index')->name('index.chat');
                Route::post('/create', 'storeConsultation')->name('store.consultation.chat');
                Route::get('/{chat_id}', 'detail')->name('detail.chat');
            });
        });
});

Route::controller(UserController::class)->group(function () {
    Route::prefix('users')
        ->group(function () {
            Route::get('/', 'index');
            Route::get('/create', 'create'); 
            Route::get('/{id}', 'show');
            Route::put('/{id}', 'update');
            Route::delete('/{id}', 'destroy');
            Route::post('/', 'store');
        });
});