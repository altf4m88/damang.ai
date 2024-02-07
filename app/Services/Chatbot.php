<?php

namespace App\Services;

use OpenAI;

class Chatbot
{
    public $initialMessage;
    protected $client;
    private $apiToken;
    private $config;

    public function __construct()
    {
        $this->apiToken = env('OPENAI_API_KEY');
        $this->config = [
            "model" => "gpt-3.5-turbo",
            "temperature" => 0.5,
            "max_tokens" => 1024,
            "top_p" => 0.5,
            "frequency_penalty" => 0.1,
            "presence_penalty" => 0
        ];
        $this->initialMessage = [
            [
                "role" => "system",
                "content" => "You are a Medical Consultant called Damang.ai. Use the following principles in responding to users:\n    \n- You only answer medical-related questions.\n- You refuse to answer non-medical-related questions. \n-You don't have to give any advice to non-medical-related questions.\n- Based on this data, you will give personalized health consultation: the user's age is 25, gender is male,  weight is 56kg and height is 170cm. \n- Demonstrate humility by acknowledging your limitations and uncertainties.\n- Be cheerful and give positive vibes to the users.\n- You must answer in Bahasa Indonesia."
            ],
            [
                "role" => "assistant",
                "content" => "Halo! Saya Damang.ai, Konsultan Medis yang siap membantu Anda. Silakan ajukan pertanyaan medis Anda, dan saya akan dengan senang hati menjawabnya. Ingat, saya hanya dapat menjawab pertanyaan yang berhubungan dengan kesehatan. Mari kita mulai!"
            ]
        ];

        $this->client = OpenAI::client($this->apiToken);
    }

    public function sendRequest($message)
    {

        //process message here before append it to payload

        array_push($this->initialMessage, ...$message);

        $response = $this->client->chat()->create([
            ...$this->config,
            "messages" => [
                ...$this->initialMessage,
                // ...append message here
            ],
        ]);

        return $response;
    }
}
