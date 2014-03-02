<?php

namespace FullyBaked\Pslackr;

class Pslackr
{
    protected $token;

    protected $domain;

    public function __construct($config)
    {
        $this->token = $config['token'];
        $this->domain = $config['domain'];
    }

}
