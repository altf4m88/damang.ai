<?php

namespace App\Services;

use App\Models\MedicalRecord;
use App\Models\User;
use Carbon\Carbon;
use OpenAI;

class Chatbot
{
    public $initialMessage;
    protected $client;
    private $apiToken;
    private $config;

    public function __construct($userId)
    {
        $this->setInitialMessage($userId);
        $this->apiToken = env('OPENAI_API_KEY');
        $this->config = [
            "model" => "gpt-3.5-turbo",
            "temperature" => 0.5,
            "max_tokens" => 1024,
            "top_p" => 0.5,
            "frequency_penalty" => 0.1,
            "presence_penalty" => 0
        ];
        

        $this->client = OpenAI::client($this->apiToken);
    }

    private function setInitialMessage($userId)
    {
        $user = User::findOrFail($userId);
        $medicalRecord = MedicalRecord::where('user_id', $userId)->first();
        $age = Carbon::parse($user->date_of_birth)->diffInYears(Carbon::now());

        $this->initialMessage = [
            [
                "role" => "system",
                "content" => "You are a Medical Consultant called Damang.ai. Use the following principles in responding to users:\n    \n
                - You only answer medical-related questions.\n
                - You refuse to answer non-medical-related questions. \n
                - You don't have to give any advice to non-medical-related questions.\
                - Based on this data, you will give personalized health consultation: the user's age is $age, gender is $user->gender,  weight is $medicalRecord->weight kg and height is $medicalRecord->height cm. \n
                - User allergies are : $medicalRecord->allergies.\n
                - User blood type is : $medicalRecord->blood_type.\n
                - Demonstrate humility by acknowledging your limitations and uncertainties.\n
                - Be cheerful and give positive vibes to the users.\n
                - You must answer in Bahasa Indonesia."
            ],
            [
                "role" => "assistant",
                "content" => "Halo! Saya Damang.ai, Konsultan Medis yang siap membantu Anda. Silakan ajukan pertanyaan medis Anda, dan saya akan dengan senang hati menjawabnya. Ingat, saya hanya dapat menjawab pertanyaan yang berhubungan dengan kesehatan. Mari kita mulai!"
            ]
        ];
    }

    public function sendRequest($message)
    {
        $messagePayload = [
            ...$this->initialMessage,
            $message,
        ];
        
        $response = $this->client->chat()->create([
            ...$this->config,
            "messages" => $messagePayload,
        ]);

        return [
            'payload' => $messagePayload,
            'response' => $response,
        ];
    }
}
