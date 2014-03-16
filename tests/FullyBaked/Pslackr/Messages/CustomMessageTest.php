<?php

namespace FullyBaked\Pslackr\Messages;

use PHPUnit_Framework_TestCase;

class CustomMessageTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    protected $expectedMessage = 'This is a test message';

    public function testConstructorSetsMessageTextProperty()
    {
        $expected = $this->expectedMessage;

        $message = $this->fetchNewCustomMessage();
        $actual = $message->getMessageText();

        $this->assertEquals($expected, $actual);
    }

    public function testAsJsonReturnsMinimumJsonRequired()
    {
        $message = $this->fetchNewCustomMessage();

        $expected = '{"text":"This is a test message"}';
        $actual = $message->asJson();

        $this->assertEquals($expected, $actual);
    }

    public function testJsonContainsChannelParam()
    {
        $message = $this->fetchNewCustomMessage();

        $message->channel('#testing');
        $expected = '{"text":"This is a test message","channel":"#testing"}';
        $actual = $message->asJson();
        $this->assertEquals($expected, $actual);
    }


    public function testJsonContainsUsernameParam()
    {
        $message = $this->fetchNewCustomMessage();

        $message->username('webhookbot');
        $expected = '{"text":"This is a test message","username":"webhookbot"}';
        $actual = $message->asJson();
        $this->assertEquals($expected, $actual);
    }

    public function testJsonContainsIconEmoji()
    {
        $message = $this->fetchNewCustomMessage();

        $message->iconEmoji(':ghost:');
        $expected = '{"text":"This is a test message","icon_emoji":":ghost:"}';
        $actual = $message->asJson();
        $this->assertEquals($expected, $actual);
    }

    public function testJsonContainsIconUrl()
    {
        $message = $this->fetchNewCustomMessage();

        $message->iconUrl('http://test.img/img.png');
        $expected = '{"text":"This is a test message","icon_url":"http:\/\/test.img\/img.png"}';
        $actual = $message->asJson();
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return CustomMessage
     */
    protected function fetchNewCustomMessage()
    {
        $message = new CustomMessage($this->expectedMessage);
        return $message;
    }
}
