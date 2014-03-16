<?php

namespace FullyBaked\Pslackr;

use Guzzle\Http\Client;

/**
 * Class Pslackr
 * @package FullyBaked\Pslackr
 */
class Pslackr implements TransportInterface
{
    /**
     * @var string
     */
    protected $token;

    /**
     * @param $config
     */
    public function __construct($config)
    {
        $this->token = $config['token'];

        $url = "https://{$config['domain']}.slack.com/services/hooks/";
        $this->client = new Client($url);
    }

    /**
     * @param Messages\MessageInterface $message
     */
    public function send(Messages\MessageInterface $message)
    {
        $path = "incoming-webhook?token={$this->token}";
        $request = $this->client->post($path);
        $request->setBody($message->asJson(), 'application/json');
        $request->send();
    }

}
