<?php

namespace FullyBaked\Pslackr;

interface Transport
{
    /**
     * must POST the $message to the Slack incoming-webhook
     */
    public function send(Messages\Message $message);
}
