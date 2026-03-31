<?php

namespace Zaptilo\Whatsapp;

use GuzzleHttp\Client;

class Zaptilo
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('zaptilo.base_url'),
            'headers' => [
                'Authorization' => 'Bearer ' . config('zaptilo.auth_token'),
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    /**
     * Send Template Message (RAW)
     */
    public function sendTemplateRaw(array $payload)
    {
        if (!isset($payload['phone']) || !isset($payload['template'])) {
            throw new \Exception("Invalid payload");
        }

        $response = $this->client->post('/api/send/template', [
            'json' => $payload
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * Get Templates
     */
    public function getTemplates()
    {
        $response = $this->client->get('/api/templates');

        return json_decode($response->getBody(), true);
    }
}
