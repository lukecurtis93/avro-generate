<?php

namespace LukeCurtis\AvroGenerate\Tests;

use LukeCurtis\AvroGenerate\Tests\TestClasses\User;
use PHPUnit\Framework\TestCase;

class AvroableContractTest extends TestCase
{
    public function test_it_can_use_the_contract_and_get_name(): void
    {
        $impl = new User(firstName: 'foo', lastName: 'bar', age: 56);
        $this->assertSame('foobar', $impl->getTopic());
        $this->assertSame('foobar', $impl->getTopicKey());
    }
}
