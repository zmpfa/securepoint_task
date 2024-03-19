<?php

namespace App\Domain\Interfaces\Serial;

interface SerialFactory
{

    /**
     * @param array<mixed> $attributes
     */
    public function get(array $attributes = []): SerialEntity;

    /**
     * @param array<mixed> $attributes
     */
    public function make(array $attributes = []): SerialEntity;

}
