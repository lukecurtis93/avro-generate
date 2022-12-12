<?php

namespace LukeCurtis\AvroGenerate\Generator;
use FlixTech\AvroSerializer\Objects\DefaultSchemaGeneratorFactory;
use League\Flysystem\Config;
use League\Flysystem\FilesystemAdapter;
use LukeCurtis\AvroGenerate\Contracts\AvroableContract;

class DefaultAvroGenerator
{
    public function __construct(private FilesystemAdapter $filesystem) {
    }

    public function generate(): bool
    {
        foreach (get_declared_classes() as $className) {
            if (in_array(AvroableContract::class, class_implements($className))) {
                $generator = DefaultSchemaGeneratorFactory::get();
                $schema = $generator->generate($className);
                $this->filesystem->write($className::getFileName(), json_encode($schema->serialize(), true), new Config);
            }
        }
        return true;
    }

    public function getFilesystem(): FilesystemAdapter
    {
        return $this->filesystem;
    }

    public function setFilesystem(FilesystemAdapter $filesystem): self{
        $this->filesystem = $filesystem;

        return $this;
    }
}