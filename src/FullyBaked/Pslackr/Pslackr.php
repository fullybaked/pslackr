<?php

namespace FullyBaked\Pslackr;

class Pslackr implements Transport
{
    protected $token;

    protected $domain;

    public function __construct($config)
    {
        $this->token = $config['token'];
        $this->domain = $config['domain'];
    }

    public function send(FullyBaked\Pslackr\Messages\Message $message)
    {

    }

}
