<?php

namespace App\Domain\UseCases\LoadFileToAccess;

use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\LoadFileToAccess\LoadFileToAccessResponseModel;

interface LoadFileToAccessOutputPort
{
    public function loadFileToAccess(LoadFileToAccessResponseModel $model): ViewModel;

    public function unableToLoadFileToAccess(LoadFileToAccessResponseModel $model, \Throwable $e): ViewModel;
}
