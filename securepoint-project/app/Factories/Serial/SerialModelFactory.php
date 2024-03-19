<?php

namespace App\Factories\Serial;

use App\Domain\Interfaces\Serial\SerialEntity;
use App\Domain\Interfaces\Serial\SerialFactory;
use App\Models\Serial;

class SerialModelFactory implements SerialFactory
{
    public function make(array $attributes = []): SerialEntity
    {
        return new Serial($attributes);
    }

    public function get(array $attributes = []): SerialEntity
    {

        return new Serial($attributes);
    }

}
