<?php

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

// Route::get('/', function () {
//     return redirect('/users');
// });
Route::get('/', ['App\Http\Controllers\ProfileController', 'index'])->name('profile');
Route::get('/create-profile', ['App\Http\Controllers\ProfileController', 'create'])->name('get-create-profile');
Route::post('/create-profile', ['App\Http\Controllers\ProfileController', 'store'])->name('post-create-profile');
Route::get('/create-medical-record/{id}', ['App\Http\Controllers\ProfileController', 'createMedicalRecord'])->name('get-create-medical-record');
Route::post('/create-medical-record/{id}', ['App\Http\Controllers\ProfileController', 'createPostMedicalRecord'])->name('post-create-medical-record');

Route::get('/testchat', function (HttpRequest $request) {

    $chat = $request->chat;

    $chatbot = new Chatbot;

    $messages = [
        [
        'role' => 'user',
        'content' => $chat
        ],
    ];

    dd($chatbot->sendRequest($messages));
    return view('welcome');
});

Route::get('/chat', function () {
    return view('chat');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
    Route::get('/users/create', 'create'); 
    Route::get('/users/{id}', 'show');
    Route::put('/users/{id}', 'update');
    Route::delete('/users/{id}', 'destroy');
    Route::post('/users', 'store');
});