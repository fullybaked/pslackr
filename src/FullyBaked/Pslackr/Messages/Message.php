<?php

namespace FullyBaked\Pslackr\Messages;

interface Message
{
    /**
     * return the data as a JSON string to send as message
     * to Slack's API
     *      - return must be a json string with at least a text: key value pair
     * @return string
     */
    public function asJson();
}
