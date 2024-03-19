<?php

namespace App\Domain\UseCases\LoadFileToAccess;

use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\LoadFileToAccess\LoadFileToAccessRequestModel;

interface LoadFileToAccessInputPort
{
    public function loadFileToAccess(LoadFileToAccessRequestModel $model): ViewModel;
}
