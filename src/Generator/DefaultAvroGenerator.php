<?php

namespace LukeCurtis\AvroGenerate\Generator;

use ClassNotAvroable;
use FlixTech\AvroSerializer\Objects\DefaultSchemaGeneratorFactory;
use League\Flysystem\Config;
use League\Flysystem\FilesystemAdapter;
use LukeCurtis\AvroGenerate\Contracts\Avroable;

class DefaultAvroGenerator
{
    public function __construct(private FilesystemAdapter $filesystem, private Config $config = new Config)
    {
    }

    public function generate(array $classNames): bool
    {
        foreach ($classNames as $className) {
            if (! in_array(Avroable::class, class_implements($className))) {
                throw new ClassNotAvroable();
            }

            $generator = DefaultSchemaGeneratorFactory::get();
            $schema = $generator->generate($className);
            $this->filesystem->write($className::getFileName(), json_encode($schema->serialize(), true), $this->config);
        }

        return true;
    }

    public function getClasses(): array
    {
        $arr = [];
        foreach (get_declared_classes() as $className) {
            if (in_array(Avroable::class, class_implements($className))) {
                $arr[] = $className;
            }
        }

        return $arr;
    }

    public function getFilesystem(): FilesystemAdapter
    {
        return $this->filesystem;
    }

    public function setFilesystem(FilesystemAdapter $filesystem): self
    {
        $this->filesystem = $filesystem;

        return $this;
    }

    public function getConfig(): Config
    {
        return $this->config;
    }

    public function setConfig(Config $config): self
    {
        $this->config = $config;

        return $this;
    }
}
