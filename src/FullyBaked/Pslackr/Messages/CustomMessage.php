<?php

namespace FullyBaked\Pslackr\Messages;

class CustomMessage implements Message
{
    protected $text;

    public function asJson()
    {
        $message = [
            'text' => $this->text
        ];
        return json_encode($message);
    }

    public function text($text)
    {
        $this->text = $text;
    }


}
