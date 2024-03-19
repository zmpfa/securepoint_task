<?php

namespace App\Domain\UseCases\GetMostAccess;

use App\Domain\Interfaces\Access\AccessEntity;

class GetMostAccessResponseModel
{
    public function __construct(private array $access,private array $singleSerial,private array $mostSerial)
    {
        //
    }

    public function getMostAccess(): array
    {
        return array($this->access,$this->singleSerial,$this->mostSerial);
    }
}