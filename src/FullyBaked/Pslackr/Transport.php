<?php

namespace FullyBaked\Pslackr;

interface Transport
{
    public function send(FullyBaked\Pslackr\Messages\Message $message);
}
