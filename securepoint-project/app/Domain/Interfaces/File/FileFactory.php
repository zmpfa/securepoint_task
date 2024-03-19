<?php

namespace App\Domain\Interfaces\File;

interface FileFactory
{

    /**
     * @param array<mixed> $attributes
     */
    public function get(array $attributes = []): FileEntity;

    /**
     * @param array<mixed> $attributes
     */
    public function make(array $attributes = []): FileEntity;

}
