<?php

namespace FullyBaked\Pslackr\Messages;

use PHPUnit_Framework_TestCase;
use Exception;

class CustomMessageTest extends PHPUnit_Framework_TestCase
{

    public function testConstructorSetsTextProperty()
    {
        $text = 'This is a test message';

        $relection = new \ReflectionClass('FullyBaked\Pslackr\Messages\CustomMessage');
        $property = $relection->getProperty('text');
        $property->setAccessible(true);

        $message = $this->getMockBuilder('FullyBaked\Pslackr\Messages\CustomMessage')
            ->setConstructorArgs([$text])
            ->getMock();

        $this->assertEquals($text, $property->getValue($message));
    }

    public function testAsJsonReturnsMinimumJsonRequired()
    {
        $text = 'This is a test message';
        $message = new CustomMessage($text);

        $expected = '{"text":"This is a test message"}';
        $result = $message->asJson();

        $this->assertEquals($result, $expected);
    }

    public function testJsonContainsChannelParam()
    {
        $message = new CustomMessage('This is a test message');

        $message->channel('#testing');
        $expected = '{"text":"This is a test message","channel":"#testing"}';
        $result = $message->asJson();
        $this->assertEquals($expected, $result);
    }


    public function testJsonContainsUsernameParam()
    {
        $message = new CustomMessage('This is a test message');

        $message->username('webhookbot');
        $expected = '{"text":"This is a test message","username":"webhookbot"}';
        $result = $message->asJson();
        $this->assertEquals($expected, $result);
    }

    public function testJsonContainsIconEmoji()
    {
        $message = new CustomMessage('This is a test message');

        $message->iconEmoji(':ghost:');
        $expected = '{"text":"This is a test message","icon_emoji":":ghost:"}';
        $result = $message->asJson();
        $this->assertEquals($expected, $result);
    }

    public function testJsonContainsIconUrl()
    {
        $message = new CustomMessage('This is a test message');

        $message->iconUrl('http://test.img/img.png');
        $expected = '{"text":"This is a test message","icon_url":"http:\/\/test.img\/img.png"}';
        $result = $message->asJson();
        $this->assertEquals($expected, $result);
    }
}
