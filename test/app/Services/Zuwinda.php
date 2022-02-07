<?php

namespace App\Services;

use GuzzleHttp\Client;

class Zuwinda
{

    protected $http;

    public function __construct(Client $client)
    {
        $this->http = $client;
    }

    public function sendMessage($to, $content)
    {
        try {
            $promise = $this->http->requestAsync('POST', 'https://api.zuwinda.com/v1/message/send-whatsapp', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'x-access-key' => env('ZUWINDA_API_KEY', 'Your access token zuwinda'),
                ],
                'json' => [
                    'instances_id' => env('ZUWINDA_INSTANCES_ID'),
                    'to' => $to,
                    'content' => $content
                ]
            ]);
            $response = $promise->wait();
            return (object) [
                'success' => true,
                'message' => 'Message sent successfully'
            ];
        } catch (\Throwable $th) {
            return (object) [
                'success' => false,
                'message' => 'Failed to send message'
            ];
        }
    }
}
