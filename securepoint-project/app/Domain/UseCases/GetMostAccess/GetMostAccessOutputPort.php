<?php

namespace App\Domain\UseCases\GetMostAccess;

use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\GetMostAccess\GetMostAccessResponseModel;

interface GetMostAccessOutputPort
{
    public function getMostAccess(GetMostAccessResponseModel $model): ViewModel;

    public function unableToGetMostAccess(GetMostAccessResponseModel $model, \Throwable $e): ViewModel;
}
