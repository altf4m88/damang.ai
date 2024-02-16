<?php

namespace App\Http\Controllers;

use App\Services\Chatbot;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index($id)
    {
        $chatbot = new Chatbot($id);

        $initialMessage = $chatbot->initialMessage;

        return view('chat.index-chat', [
            'user_id' => $id,
            'initialMessage' => $initialMessage,
        ]);
    }

    public function store(Request $request, $userId)
    {
        $chat = $request->chat;

        $chatbot = new Chatbot($userId);

        $messages = [
            [
                'role' => 'user',
                'content' => $chat
            ],
        ];

        $response = $chatbot->sendRequest($messages);

        return response()->json($response);
    }

    public function show($id, $chat_id)
    {
        return view('chat', ['user_id' => $id, 'chat_id' => $chat_id]);
    }

    public function update($id, $chat_id, Request $request)
    {
        //
    }

    public function destroy($id, $chat_id)
    {
        //
    }

    public function create($id)
    {
        return view('chat', ['user_id' => $id]);
    }
}
