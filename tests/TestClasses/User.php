<?php

namespace LukeCurtis\AvroGenerate\Tests\TestClasses;

use FlixTech\AvroSerializer\Objects\Schema\Generation\Annotations as SerDe;
use LukeCurtis\AvroGenerate\Contracts\AvroableContract;

/**
 * @SerDe\AvroType("record")
 * @SerDe\AvroName("user")
 */
class User implements AvroableContract
{
    /**
     * @SerDe\AvroType("string")
     *
     * @var string
     */
    private $firstName;

    /**
     * @SerDe\AvroType("string")
     *
     * @var string
     */
    private $lastName;

    /**
     * @SerDe\AvroType("int")
     *
     * @var int
     */
    private $age;

    public function __construct(string $firstName, string $lastName, int $age)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @return string
     */
    public function getTopicKey(): string
    {
        return 'foobar';
    }

    /**
     * @return string
     */
    public function getTopic(): string
    {
        return 'foobar';
    }

    public function generateSchema(): array
    {
        return [];
    }

    public static function getFileName(): string
    {
        return 'User';
    }
}
