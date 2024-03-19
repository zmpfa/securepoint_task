<?php

namespace App\Domain\Interfaces\File;

interface FileEntity
{
    public function getFileId(): int;

    public function getFileName(): string;

    public function getOriginalName(): string;

    public function getFilePath(): string;
}
