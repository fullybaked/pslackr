<?php

namespace FullyBaked\Pslackr\Messages;

class Message
{
    protected $text;

    public function text($text)
    {
        $this->text = $text;
    }

    public function asJson()
    {
        $message = [
            'text' => $this->text
        ];
        return json_encode($message);
    }
}
