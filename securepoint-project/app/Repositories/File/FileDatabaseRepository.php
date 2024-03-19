<?php

namespace App\Repositories\File;

use App\Domain\Interfaces\File\FileEntity;
use App\Domain\Interfaces\File\FileRepository;
use App\Models\File;

class FileDatabaseRepository implements FileRepository
{
    public function getFile(): array
    {
        return File::all()->toArray();
    }

    public function create(FileEntity $file): FileEntity
    {
        return File::create([
            'file_name' => $file->getFileName(),
            'original_name' => $file->getOriginalName(),
            'file_path' => $file->getFilePath(),
        ]);
    }
}
