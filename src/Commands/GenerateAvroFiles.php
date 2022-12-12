<?php

namespace LukeCurtis\AvroGenerate\Generator;

use League\Flysystem\FilesystemAdapter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateAvroFiles extends Command
{
    public function __construct(private FilesystemAdapter $filesystem = new InMemoryFilesystemAdapter('./')) {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // ... put here the code to create the user

        // this method must return an integer number with the "exit status code"
        // of the command. You can also use these constants to make code more readable

        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))
        return Command::SUCCESS;
    }
}
