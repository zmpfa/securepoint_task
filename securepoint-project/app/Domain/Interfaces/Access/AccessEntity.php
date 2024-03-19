<?php

namespace App\Domain\Interfaces\Access;

use Datetime;

interface AccessEntity
{
    public function getAccessId(): int;

    public function getPublicIp(): string;

    public function getNameUpdateServer(): string;

    public function getAccessTime(): DateTime;

    public function getUrlHttpProtocolVersion(): string;

    public function getHttpResponse(): int;

    public function getSizeResponse(): int;

    public function getNameProxy(): string;

    public function getRequestTime(): int;

    public function getSerial(): string;

    public function getFirmwareVersion(): string;

    public function getSpecs(): string;

    public function getNotAfter(): string;

    public function getRemainingDays(): string;

}
