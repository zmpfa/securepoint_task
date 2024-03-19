<?php

namespace App\Models;

use App\Domain\Interfaces\Serial\SerialEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serial extends Model implements SerialEntity
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'serial_id',
        'serial',
    ];

    //Serial Entity

    public function getSerialId(): int
    {
        return $this->attributes['serial_id'];
    }

    public function getSerial(): string
    {
        return $this->attributes['serial'];
    }

    public function hardwares()
    {
        return $this->belongsToMany(Hardware::class);
    }
}
