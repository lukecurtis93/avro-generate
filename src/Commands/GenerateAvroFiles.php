<?php

namespace LukeCurtis\AvroGenerate\Commands;

use League\Flysystem\FilesystemAdapter;
use League\Flysystem\InMemory\InMemoryFilesystemAdapter;
use LukeCurtis\AvroGenerate\Generator\DefaultAvroGenerator;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'generate')]
class GenerateAvroFiles extends Command
{
    protected static $defaultDescription = 'Generate Avro files';

    public function __construct(private FilesystemAdapter $filesystem = new InMemoryFilesystemAdapter('./'))
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $generator = new DefaultAvroGenerator($this->filesystem);

        $generator->generate();

        return Command::SUCCESS;
    }
}
