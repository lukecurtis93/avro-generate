<?php

namespace LukeCurtis\AvroGenerate\Tests;

use League\Flysystem\InMemory\InMemoryFilesystemAdapter;
use LukeCurtis\AvroGenerate\Generator\DefaultAvroGenerator;
use LukeCurtis\AvroGenerate\Tests\TestClasses\User;
use PHPUnit\Framework\TestCase;

class AvroGenerateClassTest extends TestCase
{
    public function test_it_can_generate(): void
    {
        $expectedFile = (new User(firstName: 'Luke', lastName: 'Curtis', age: 29));

        $generator = new DefaultAvroGenerator(filesystem: new InMemoryFilesystemAdapter('./'));

        $generator->generate();

        $this->assertTrue($generator->getFilesystem()->fileExists($expectedFile->getFileName()));
    }
}
