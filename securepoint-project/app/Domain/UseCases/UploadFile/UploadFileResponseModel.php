<?php

namespace App\Domain\UseCases\UploadFile;

use App\Domain\Interfaces\File\FileEntity;

class UploadFileResponseModel
{
    public function __construct(private FileEntity $file)
    {
        //
    }

    public function retrieveFile(): FileEntity
    {
        return $this->file;
    }
}
