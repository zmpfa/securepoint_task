<?php

namespace App\Models;

use App\Domain\Interfaces\Hardware\HardwareEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hardware extends Model implements HardwareEntity
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hardware_id',
        'mac',
        'architecture',
        'machine',
        'mem',
        'cpu',
        'disk_root',
        'disk_data',
        'uptime',
        'fwversion',
        'l2tp',
        'qos',
        'httpaveng',
        'spcf',
        'footer',
    ];

    //Hardware Enitiy

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getHardwareId(): int
    {
        return $this->attributes['hardware_id'];
    }

    public function getMac(): string
    {
        return $this->attributes['mac'];
    }

    public function getArchitecture(): string
    {
        return $this->attributes['architecture'];
    }

    public function getMachine(): string
    {
        return $this->attributes['machine'];
    }

    public function getMem(): string
    {
        return $this->attributes['mem'];
    }

    public function getCpu(): string
    {
        return $this->attributes['cpu'];
    }

    public function getDiskRoot(): string
    {
        return $this->attributes['disk_root'];
    }

    public function getDiskData(): string
    {
        return $this->attributes['disk_data'];
    }

    public function getUpTime(): string
    {
        return $this->attributes['uptime'];
    }

    public function getFWversion(): string
    {
        return $this->attributes['fwversion'];
    }

    public function getL2TP(): string
    {
        return $this->attributes['l2tp'];
    }

    public function getQOS(): int
    {
        return $this->attributes['qos'];
    }

    public function getHttpAveng(): string
    {
        return $this->attributes['httpaveng'];
    }

    public function getSPCF(): int
    {
        return $this->attributes['spcf'];
    }

    public function getFooter(): bool
    {
        return $this->attributes['footer'];
    }

    public function serials()
    {
        return $this->belongsToMany(Access::class);
    }

}
