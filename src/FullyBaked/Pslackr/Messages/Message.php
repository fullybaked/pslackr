<?php

namespace FullyBaked\Pslackr\Messages;

interface Message
{
    /**
     * return the data as a JSON string to send as message
     * to Slack's API
     */
    public function asJson();

    /**
     * set an optional 'channel' parameter of the message
     */
    public function channel($channelName);

    /**
     * set the optional name of the bot that will appear in
     * the channel logs with the message
     */
    public function username($userName);

    /**
     * provide a URL to an icon/avatar to use for the message
     * user
     */
    public function iconUrl($url);

    /**
     * provide an :emoji: token that Slack will understand
     * to use as the icon/avatar for the message user
     */
    public function iconEmoji($emojiToken);
}
