<?php

namespace App\Factories\Hardware;

use App\Domain\Interfaces\Hardware\HardwareEntity;
use App\Domain\Interfaces\Hardware\HardwareFactory;
use App\Models\Hardware;

class HardwareModelFactory implements HardwareFactory
{
    public function make(array $attributes = []): HardwareEntity
    {
        if ((isset($attributes['spcf']) && !is_null($attributes['spcf'])) && empty($attributes['spcf'])) {
            $attributes['spcf'] = 0;
        }

        if ((isset($attributes['l2tp']) && !is_null($attributes['l2tp'])) && empty($attributes['l2tp'])) {
            $attributes['l2tp'] = 0;
        }
        return new Hardware($attributes);
    }

    public function get(array $attributes = []): HardwareEntity
    {

        dd($attributes);

        return new Hardware($attributes);
    }
}
