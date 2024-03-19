<?php

namespace App\Models;

use App\Domain\Interfaces\Access\AccessEntity;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model implements AccessEntity
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'access_id',
        'public_ip',
        'name_update_server',
        'date_time',
        'url_http_protocol_version',
        'http_response',
        'size_response',
        'name_proxy',
        'request_time',
        'serial',
        'firmware_version',
        'specs',
        'not_after',
        'remaining_days',
    ];

    protected $casts = [
        'date_time' => 'datetime',
    ];

    //Access Entity

    public function getAccessId(): int
    {
        return $this->attributes['access_id'];
    }

    public function getPublicIp(): string
    {
        return $this->attributes['public_ip'];
    }

    public function getNameUpdateServer(): string
    {
        return $this->attributes['name_update_server'];
    }

    public function getAccessTime(): DateTime
    {
        return $this->attributes['date_time'];
    }

    public function getUrlHttpProtocolVersion(): string
    {
        return $this->attributes['url_http_protocol_version'];
    }

    public function getHttpResponse(): int
    {
        return $this->attributes['http_response'];
    }

    public function getSizeResponse(): int
    {
        return $this->attributes['size_response'];
    }

    public function getNameProxy(): string
    {
        return $this->attributes['name_proxy'];
    }

    public function getRequestTime(): int
    {
        return $this->attributes['request_time'];
    }

    public function getSerial(): string
    {
        return $this->attributes['serial'];
    }

    public function getFirmwareVersion(): string
    {
        return $this->attributes['firmware_version'];
    }

    public function getSpecs(): string
    {
        return $this->attributes['specs'];
    }

    public function getNotAfter(): string
    {
        return $this->attributes['not_after'];
    }

    public function getRemainingDays(): string
    {
        return $this->attributes['remaining_days'];
    }

    /**
     * The roles that belong to the Access
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function hardwares()
    {
        return $this->belongsToMany(Hardware::class, 'access_hardware', 'hardware_id', 'access_id');
    }
}
