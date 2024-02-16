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

    public function storeConsultation($id)
    {
        $chatbot = new Chatbot($id);

        $consultation = new Consultation();
        $consultation->user_id = $id;
        $consultation->chat_history = $chatbot->initialMessage;
        $consultation->start_time =  Carbon::now();

        
    }

    public function store(Request $request)
    {

        // nanti di append sama pesan pesan sebelumnya, tar handle ma gw - fadhil

        // $chat = $request->chat;
        // $user_id = $request->user_id;

        // $chatbot = new Chatbot($user_id);

        // $messages = [
        //     [
        //         'role' => 'user',
        //         'content' => $chat
        //     ],
        // ];

        // $response = $chatbot->sendRequest($messages);

        // return response()->json($response);
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
