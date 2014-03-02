<?php

namespace FullyBaked\Pslackr;

use PHPUnit_Framework_TestCase;

class PslackrTest extends PHPUnit_Framework_TestCase
{
    public function testConstructorSetsConfigProperty()
    {
        $config = ['domain' => 'tester', 'token' => '123456'];

        $relection = new \ReflectionClass('FullyBaked\Pslackr\Pslackr');
        $tokenAttr = $relection->getProperty('token');
        $tokenAttr->setAccessible(true);
        $domainAttr = $relection->getProperty('domain');
        $domainAttr->setAccessible(true);

        $slack = $this->getMockBuilder('FullyBaked\Pslackr\Pslackr')
            ->setConstructorArgs([$config])
            ->getMock();

        $this->assertEquals($config['token'], $tokenAttr->getValue($slack));
        $this->assertEquals($config['domain'], $domainAttr->getValue($slack));
    }
}
