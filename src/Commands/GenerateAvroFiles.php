<?php

namespace LukeCurtis\AvroGenerate\Commands;

use League\Flysystem\FilesystemAdapter;
use League\Flysystem\InMemory\InMemoryFilesystemAdapter;
use League\Flysystem\Local\LocalFilesystemAdapter;
use LukeCurtis\AvroGenerate\Generator\DefaultAvroGenerator;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'generate')]
class GenerateAvroFiles extends Command
{
    protected static $defaultDescription = 'Generate Avro files';

    public function __construct(private FilesystemAdapter $filesystem = new LocalFilesystemAdapter('./'))
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('filesystem', InputArgument::OPTIONAL, 'Filesystem');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $filesystem = $input->getArgument('filesystem') === 'memory' ? new InMemoryFilesystemAdapter('./') : $this->filesystem;

        try {
            $generator = new DefaultAvroGenerator($filesystem);
            $classes = $generator->getClasses();
            $output->writeln('Generating files for classes: '.implode($classes));
            $generator->generate($classes);
        } catch (\Exception $e) {
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
