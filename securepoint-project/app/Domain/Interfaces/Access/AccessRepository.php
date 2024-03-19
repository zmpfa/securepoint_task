<?php

namespace App\Domain\Interfaces\Access;

use Illuminate\Support\Collection;

interface AccessRepository
{

    public function create(array $access): collection;

    public function getMostAccess(): array;

}
