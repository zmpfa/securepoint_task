<?php

namespace App\Factories\File;

use App\Domain\Interfaces\File\FileEntity;
use App\Domain\Interfaces\File\FileFactory;
use App\Models\File;

class FileModelFactory implements FileFactory
{
    public function make(array $attributes = []): FileEntity
    {
        return new File($attributes);
    }

    public function get(array $attributes = []): FileEntity
    {
        if (isset($attributes['file_path']) && is_string($attributes['file_path'])) {
            $attributes['file_path'] = "public/" . $attributes['file_path'];
        }

        return new File($attributes);
    }

}
