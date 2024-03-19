<?php

namespace App\Domain\UseCases\GetMostAccess;

use App\Domain\Interfaces\ViewModel;

interface GetMostAccessInputPort
{
    public function getMostAccess(): ViewModel;
}
