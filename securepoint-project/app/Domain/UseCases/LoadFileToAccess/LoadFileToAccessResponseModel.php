<?php

namespace App\Domain\UseCases\LoadFileToAccess;

use App\Domain\Interfaces\File\FileEntity;

class LoadFileToAccessResponseModel
{
    public function __construct(private FileEntity $access)
    {
        //
    }

    public function loadFileToAccess(): FileEntity
    {
        return $this->access;
    }
}
