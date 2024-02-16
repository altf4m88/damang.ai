<?php

namespace App\Http\Controllers;

use App\Services\Chatbot;
use App\Models\Consultation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index($id)
    {
        return view('chat.default-chat');
    }
    
    public function detail($id, $chat_id)
    {
        $chatbot = new Chatbot($id);
    
        $initialMessage = $chatbot->initialMessage;
         return view('chat.index-chat', [
            'user_id' => $id,
            'initialMessage' => $initialMessage,
        ]);

    }

    public function storeConsultation($id)
    {
        $chatbot = new Chatbot($id);

        $consultation = new Consultation();
        $consultation->user_id = $id;
        $consultation->chat_history = $chatbot->initialMessage;
        $consultation->start_time =  Carbon::now();
        
    }

    public function store(Request $request, $userId)
    {
        $chat = $request->message;

        $chatbot = new Chatbot($userId);

        $messages = [
            'role' => 'user',
            'content' => $chat,
        ];

        $response = $chatbot->sendRequest($messages);

        $updateConsultation = [
            ...$response['payload'],
            [
                ...$response['response']['choices'][0]['message'],
            ]
        ];

        // update the consultation item

        return response()->json([
            'history' => $updateConsultation,
            'answer' => $response['response']['choices'][0]['message']
        ]);
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
