<?php

namespace App\Services;

use OpenAI;

class Chatbot
{
    protected $client;
    private $apiToken;
    private $config;

    public function __construct()
    {
        $this->apiToken = env('OPENAI_API_KEY');
        $this->config = [
            "model" => "gpt-3.5-turbo",
            "temperature" => 0.5,
            "max_tokens" => 512,
            "top_p" => 1,
            "frequency_penalty" => 0,
            "presence_penalty" => 0
        ];
        $this->client = OpenAI::client($this->apiToken);
    }

    public function sendRequest($message)
    {

        //process message here before append it to payload

        $response = $this->client->completions()->create([
            $this->config,
            "messages" => [
                [
                "role" => "system",
                "content" => "You are a Medical Consultant. Use the following principles in responding to users:\n    \n- You only answer medical-related questions.\n- You refuse to answer non-medical-related questions. You don't have to give any advice to such a question.\n- Based on this data, you will give personalized health consultation: the user's age is 25, weight is 56kg and height is 170cm.\n- Demonstrate humility by acknowledging your limitations and uncertainties.\n- You must answer in Bahasa Indonesia."
                ]
                // ...append message here
            ],

        ]);

        return $response['choices'][0]['text'] ?? 'Yo ndak tau kok tanya saya';
    }
}
