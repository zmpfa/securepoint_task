<?php

namespace App\Domain\UseCases\ShowFile;

use Illuminate\Http\UploadedFile;

class ShowFileRequestModel
{
/**
 * @param array<mixed> $attributes
 */
    public function __construct(
        private array $attributes
    ) {
    }

    public function getFileId(): int
    {
        return $this->attributes['file_id'] ?? '';
    }

    public function getFileName(): string
    {
        return $this->attributes['filename'] ?? '';
    }

    public function getOriginalName(): string
    {
        return $this->attributes['original_name'] ?? '';
    }

    public function getfilePath(): string
    {
        return $this->attributes['file_path'] ?? '';
    }

    public function getfile(): UploadedFile
    {
        return $this->attributes['file_upload'] ?? '';
    }

}
