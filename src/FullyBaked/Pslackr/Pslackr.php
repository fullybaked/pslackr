<?php

namespace FullyBaked\Pslackr;

class Pslackr implements Transport
{
    protected $token;

    protected $domain;

    protected $httpClient;

    public function __construct($config, $httpClient)
    {
        $this->token = $config['token'];
        $this->domain = $config['domain'];
        $this->client = $httpClient;
    }

    public function send(FullyBaked\Pslackr\Messages\Message $message)
    {

    }

}
