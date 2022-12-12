<?php

namespace LukeCurtis\AvroGenerate\Contracts;

interface AvroableContract {
    public function getTopicKey(): string;

    public function getTopic(): string;

    public function generateSchema(): array;

    public static function getFileName(): string;
}