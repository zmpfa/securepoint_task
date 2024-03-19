<?php

namespace App\Domain\Interfaces\Hardware;

interface HardwareEntity
{
    public function getHardwareId(): int;

    public function getMac(): string;

    public function getArchitecture(): string;

    public function getMachine(): string;

    public function getMem(): string;

    public function getCpu(): string;

    public function getDiskRoot(): string;

    public function getDiskData(): string;

    public function getUpTime(): string;

    public function getFWversion(): string;

    public function getL2TP(): string;

    public function getQOS(): int;

    public function getHttpAveng(): string;

    public function getSPCF(): int;

    public function getFooter(): bool;
}
