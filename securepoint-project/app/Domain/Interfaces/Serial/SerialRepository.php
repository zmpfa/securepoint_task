<?php

namespace App\Domain\Interfaces\Serial;

use Illuminate\Support\Collection;

interface SerialRepository
{

    public function make(collection $serial, collection $hardware): collection;

    public function get(array $serial): array;

    public function getSingleSerialWithMoreDevice(): SerialEntity;

    public function getMostSerialWithMoreDeive(): collection;
}
