<?php

namespace LukeCurtis\AvroGenerate;

use LukeCurtis\AvroGenerate\Generator\GenerateAvroFiles;
use Symfony\Component\Console\Application;

class AvroGenerateClass
{
    public function __construct()
    {
        $application = new Application();

        $application->add(new GenerateAvroFiles);

        $application->run();
    }
}
