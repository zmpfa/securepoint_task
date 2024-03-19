<?php

namespace App\Domain\UseCases\ShowFile;

use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\ShowFile\ShowFileResponseModel;

interface ShowFileOutputPort
{
    public function getAllFile(ShowFileResponseModel $model): ViewModel;

    public function unableToGetAllFile(ShowFileResponseModel $model, \Throwable $e): ViewModel;
}
