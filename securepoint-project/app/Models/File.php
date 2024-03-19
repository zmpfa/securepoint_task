<?php

namespace App\Models;

use App\Domain\Interfaces\File\FileEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model implements FileEntity
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'file_id',
        'file_name',
        'original_name',
        'file_path',
    ];

    //File Entity

    public function getFileId(): int
    {
        return $this->attributes['file_ip'];
    }

    public function getFileName(): string
    {
        return $this->attributes['file_name'];
    }

    public function getOriginalName(): string
    {
        return $this->attributes['original_name'];
    }

    public function getFilePath(): string
    {
        return $this->attributes['file_path'];
    }

}
