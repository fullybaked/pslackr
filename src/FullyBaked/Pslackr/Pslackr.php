<?php

namespace FullyBaked\Pslackr;

use Guzzle\Http\Client;

class Pslackr implements Transport
{
    protected $token;

    public function __construct($config)
    {
        $this->token = $config['token'];

        $url = "https://{$config['domain']}.slack.com/services/hooks/";
        $this->client = new Client($url);
    }

    public function send(Messages\Message $message)
    {
        $path = "incoming-webhook?token={$this->token}";
        $request = $this->client->post($path);
        $request->setBody($message->asJson(), 'application/json');
        $request->send();
    }

}
