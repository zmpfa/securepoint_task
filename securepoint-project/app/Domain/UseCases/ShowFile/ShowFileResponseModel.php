<?php

namespace App\Domain\UseCases\ShowFile;

class ShowFileResponseModel
{
    public function __construct(private array $file)
    {
        //
    }

    public function getAllFile(): array
    {
        return $this->file;
    }
}
