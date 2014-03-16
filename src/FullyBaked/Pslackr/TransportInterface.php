<?php

namespace FullyBaked\Pslackr;

interface TransportInterface
{
    /**
     * must POST the $message to the Slack incoming-webhook
     */
    public function send(Messages\MessageInterface $message);
}
