<?php

namespace App\Domain\Interfaces\Hardware;

use Illuminate\Support\Collection;

interface HardwareRepository
{

    public function make(array $hardware): collection;

}
