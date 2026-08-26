<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class AIClassifierService{

    public function classify(string $subject, string $description): array{
        $response = Http::withToken(config('services.openai.api_key'))->post('https://api.openai.com/v1/chat/completions', [
        
            'model' => 'gpt-4o-mini',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a support ticket classifier. Respond ONLY in JSON format: {"category": "billing|technical|general", 
                    "priority" :"low|medium|high"}'
                ],
                [
                    'role' => 'user',
                    'content' => "Subject: {$subject} \nDescription: {$description}"
                ]
            ]
        ]);

        return json_decode($response->json()['choices'][0]['message']['content'], true);
    }
}