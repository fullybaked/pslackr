<?php

namespace FullyBaked\Pslackr\Messages;

/**
 * Class CustomMessage
 * @package FullyBaked\Pslackr\Messages
 */
class CustomMessage implements MessageInterface
{
    /**
     * @var string
     */
    protected $messageText;

    /**
     * @var array
     */
    protected $optionalFields = [];

    /**
     * @param string $messageText
     */
    public function __construct($messageText)
    {
        $this->setMessageText($messageText);
    }

    /**
     * @param string $messageText
     */
    public function setMessageText($messageText)
    {
        $this->messageText = $messageText;
    }

    /**
     * @return string
     */
    public function getMessageText()
    {
        return $this->messageText;
    }

    /**
     * @return string
     */
    public function asJson()
    {
        $message = [
            'text' => $this->getMessageText()
        ];

        $message = array_merge($message, $this->optionalFields);

        return json_encode($message);
    }

    /**
     * @param string $channelName
     */
    public function channel($channelName)
    {
        $this->optionalFields['channel'] = $channelName;
    }

    /**
     * @param string $username
     */
    public function username($username)
    {
        $this->optionalFields['username'] = $username;
    }

    /**
     * @param string $token
     */
    public function iconEmoji($token)
    {
        $this->optionalFields['icon_emoji'] = $token;
    }

    /**
     * @param string $url
     */
    public function iconUrl($url)
    {
        $this->optionalFields['icon_url'] = $url;
    }
}
