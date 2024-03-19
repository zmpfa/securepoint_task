<?php

namespace App\Domain\Interfaces\Hardware;

interface HardwareFactory
{

    /**
     * @param array<mixed> $attributes
     */
    public function get(array $attributes = []): HardwareEntity;

    /**
     * @param array<mixed> $attributes
     */
    public function make(array $attributes = []): HardwareEntity;

}
