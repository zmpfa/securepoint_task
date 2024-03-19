<?php

namespace App\Domain\Interfaces\File;

interface FileRepository
{

    public function create(FileEntity $file): FileEntity;

    public function getFile(): array;

}
