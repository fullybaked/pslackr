<?php

namespace FullyBaked\Pslackr\Messages;

class CustomMessage implements Message
{
    protected $text;

    protected $optionalFields = [];

    public function __construct($messageText)
    {
        $this->text = $messageText;
    }
    public function asJson()
    {
        $message = ['text' => 'This is a test message'];

        $message = array_merge($message, $this->optionalFields);

        return json_encode($message);
    }

    public function channel($channelName)
    {
        $this->optionalFields['channel'] = $channelName;
    }

    public function username($username)
    {
        $this->optionalFields['username'] = $username;
    }

    public function iconEmoji($token)
    {
        $this->optionalFields['icon_emoji'] = $token;
    }

    public function iconUrl($url)
    {
        $this->optionalFields['icon_url'] = $url;
    }
}
