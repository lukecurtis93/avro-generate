<?php

namespace LukeCurtis\AvroGenerate\Tests;

use League\Flysystem\InMemory\InMemoryFilesystemAdapter;
use LukeCurtis\AvroGenerate\Exceptions\ClassNotAvroable;
use LukeCurtis\AvroGenerate\Generator\DefaultAvroGenerator;
use LukeCurtis\AvroGenerate\Tests\TestClasses\User;
use PHPUnit\Framework\TestCase;

class AvroGenerateClassTest extends TestCase
{
    public function test_it_can_generate(): void
    {
        $expectedFile = (new User(firstName: 'Luke', lastName: 'Curtis', age: 29));

        $generator = new DefaultAvroGenerator(filesystem: new InMemoryFilesystemAdapter('./'));

        $generator->generate([User::class]);

        $this->assertTrue($generator->getFilesystem()->fileExists($expectedFile->getFileName()));
    }

    public function test_it_generates_exception(): void
    {
        $this->expectException(ClassNotAvroable::class);

        $generator = new DefaultAvroGenerator(filesystem: new InMemoryFilesystemAdapter('./'));

        $generator->generate([new class()
        {
        }, ]);
    }

    public function test_it_can_get_classes(): void
    {
        $generator = new DefaultAvroGenerator(filesystem: new InMemoryFilesystemAdapter('./'));
        $arr = $generator->getClasses();
        $this->assertContains(User::class, $arr);
    }
}
