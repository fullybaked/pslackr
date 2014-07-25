<?php

namespace FullyBaked\Pslackr;

use GuzzleHttp\Client;

class Pslackr implements Transport
{
    protected $token;

    public function __construct($config)
    {
        $this->endpoint = "https://{$config['domain']}.slack.com/services/hooks/incoming-webhook?token={$config['token']}";

        $this->client = new Client();
    }

    public function send(Messages\Message $message)
    {
        $request = $this->client->createRequest('POST', $this->endpoint, [
            'json' => $message()
        ]);
        $this->client->send($request);
    }

}
