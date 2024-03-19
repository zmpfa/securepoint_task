<?php

namespace App\Domain\UseCases\ShowFile;

use App\Domain\Interfaces\ViewModel;

interface ShowFileInputPort
{
    public function getAllFile(): ViewModel;
}
