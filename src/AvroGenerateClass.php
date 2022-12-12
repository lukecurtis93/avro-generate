<?php
namespace LukeCurtis\AvroGenerate;

use League\Flysystem\InMemory\InMemoryFilesystemAdapter;
use Symfony\Component\Console\Application;
use LukeCurtis\AvroGenerate\Generator\GenerateAvroFiles;

class AvroGenerateClass
{
    public function __construct() {
        $application = new Application();

        $application->add(new GenerateAvroFiles));
        
        $application->run();
    }

}
