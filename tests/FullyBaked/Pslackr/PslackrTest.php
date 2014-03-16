<?php

namespace FullyBaked\Pslackr;

use PHPUnit_Framework_TestCase;

/**
 * Class PslackrTest
 * @package FullyBaked\Pslackr
 */
class PslackrTest extends PHPUnit_Framework_TestCase
{
    public function testConstructorSetsConfigProperty()
    {
        $config = ['domain' => 'tester', 'token' => '123456'];

        $reflection = new \ReflectionClass('FullyBaked\Pslackr\Pslackr');
        $tokenAttr = $reflection->getProperty('token');
        $tokenAttr->setAccessible(true);

        $slack = new Pslackr($config);

        $this->assertEquals($config['token'], $tokenAttr->getValue($slack));
    }
}
