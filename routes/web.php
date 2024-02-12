<?php

use App\Services\Chatbot;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Route;

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

Route::get('/', ['App\Http\Controllers\ProfileController', 'index'])->name('profile');

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
