<?php

namespace App\Factories\Access;

use App\Domain\Interfaces\Access\AccessEntity;
use App\Domain\Interfaces\Access\AccessFactory;
use App\Models\Access;

class AccessModelFactory implements AccessFactory
{
    public function get(array $attributes = []): AccessEntity
    {
        return new Access($attributes);
    }

    public function make(array $attributes = []): AccessEntity
    {

        if (isset($attributes['date_time']) && is_string($attributes['date_time'])) {
            $attributes['date_time'] = str_replace(array('[', ']'), '', $attributes['date_time']);

        }

        if (isset($attributes['request_time']) && !strtotime($attributes['request_time'])) {
            $attributes['request_time'] = "0.000";
        }

        $attributes['name_proxy'] = str_replace('proxy=', '', $attributes['name_proxy']);
        $attributes['serial'] = str_replace('serial=', '', $attributes['serial']);
        $attributes['request_time'] = str_replace('rt=', '', $attributes['request_time']);
        $attributes['specs'] = str_replace('specs=', '', $attributes['specs']);
        $attributes['firmware_version'] = str_replace('version=', '', $attributes['firmware_version']);
        return new Access($attributes);
    }

}
