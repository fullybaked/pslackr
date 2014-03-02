<?php

namespace FullyBaked\Pslackr\Messages;

use PHPUnit_Framework_TestCase;
use Exception;

class CustomMessageTest extends PHPUnit_Framework_TestCase
{

    public function testConstructorSetsTextProperty()
    {
        $text = 'This is as test message';

        $relection = new \ReflectionClass('FullyBaked\Pslackr\Messages\CustomMessage');
        $property = $relection->getProperty('text');
        $property->setAccessible(true);

        $message = $this->getMockBuilder('FullyBaked\Pslackr\Messages\CustomMessage')
            ->setConstructorArgs([$text])
            ->getMock();

        $this->assertEquals($text, $property->getValue($message));
    }

}
