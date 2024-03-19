<?php

namespace App\Domain\Interfaces\Access;

interface AccessFactory
{

    /**
     * @param array<mixed> $attributes
     */
    public function get(array $attributes = []): AccessEntity;

    /**
     * @param array<mixed> $attributes
     */
    public function make(array $attributes = []): AccessEntity;

}
