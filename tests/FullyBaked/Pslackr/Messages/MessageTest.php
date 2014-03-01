<?php

namespace FullyBaked\Pslackr\Messages;

use PHPUnit_Framework_TestCase;
use Exception;

class MessageTest extends PHPUnit_Framework_TestCase
{
    public function testAsJsonReturnsMinimumJsonRequired()
    {
        $message = new Message();
        $message->text('Message text goes here');
        $result = $message->asJson();
        $expected = '{"text":"Message text goes here"}';
        $this->assertEquals($result, $expected);

        $message->text('Change the message and check');
        $result = $message->asJson();
        $expected = '{"text":"Change the message and check"}';
        $this->assertEquals($result, $expected);
    }
}
