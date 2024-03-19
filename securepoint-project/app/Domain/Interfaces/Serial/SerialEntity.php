<?php

namespace App\Domain\Interfaces\Serial;

interface SerialEntity
{
    public function getSerialId(): int;

    public function getSerial(): string;

}
