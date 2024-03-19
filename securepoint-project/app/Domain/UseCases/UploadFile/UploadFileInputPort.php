<?php

namespace App\Domain\UseCases\UploadFile;

use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\UploadFile\UploadFileRequestModel;

interface UploadFileInputPort
{
    public function retrieveFile(UploadFileRequestModel $model): ViewModel;
}
