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
        $consultations = Consultation::where('user_id', $id)->get();

        return view('chat.default-chat', compact('id', 'consultations'));
    }
    
    public function detail($id, $chat_id)
    {
        $chatbot = new Chatbot($id);
        $consultations = Consultation::where('user_id', $id)->get();
        $consultation = Consultation::find($chat_id);

         return view('chat.index-chat', [
            'user_id' => $id,
            'chat_id' => $chat_id,
            'consultations' =>  $consultations,
            'consultation' => $consultation,
        ]);

    }

    public function storeConsultation($id)
    {
        $chatbot = new Chatbot($id);

        $consultation = new Consultation();
        $consultation->user_id = $id;
        $consultation->chat_history = $chatbot->initialMessage;
        $consultation->start_time =  Carbon::now();
        $consultation->save();

        return redirect()->route('detail.chat', [
            'id' => $id,
            'chat_id' => $consultation->id
        ]);
    }

    public function store(Request $request, $userId, $chatId)
    {
        $chat = $request->message;

        $chatbot = new Chatbot($userId);
        $consultation = Consultation::find($chatId);

        $messages = [
            ...$consultation->chat_history,
            [
                'role' => 'user',
                'content' => $chat,
            ]
        ];

        $response = $chatbot->sendRequest($messages);

        $updateConsultation = [
            ...$response['payload'],
            [
                ...$response['response']['choices'][0]['message'],
            ]
        ];

        $consultation->chat_history = $updateConsultation;
        $consultation->save();

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
