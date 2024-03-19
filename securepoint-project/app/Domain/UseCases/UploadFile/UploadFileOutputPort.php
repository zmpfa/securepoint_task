<?php

namespace App\Domain\UseCases\UploadFile;

use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\UploadFile\UploadFileResponseModel;

interface UploadFileOutputPort
{
    public function fileRetrieve(UploadFileResponseModel $model): ViewModel;

    public function unableToRetrieveFile(UploadFileResponseModel $model, \Throwable $e): ViewModel;
}
