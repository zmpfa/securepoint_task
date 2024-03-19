<?php

namespace App\Repositories\Serial;

use App\Domain\Interfaces\Serial\SerialEntity;
use App\Domain\Interfaces\Serial\SerialRepository;
use App\Models\Serial;
use Illuminate\Support\Collection;


class SerialDatabaseRepository implements SerialRepository
{
    public function make(collection $serial, collection $hardware): collection
    {
        $collectionSerial = collect();
        foreach($serial as $key => $value)
        {
            $record = Serial::where('serial',$value->getSerial())->first();
            if(!$record ){
            
            $record = Serial::create([
                    'serial' => $value->getSerial(),
                ]);
                
            }
            $collectionSerial->add($record);
            $record->hardwares()->attach($hardware[$key]->getId());

        }
        return $collectionSerial;
    }

    public function get(array $serial): array
    {

    }

    public function getSingleSerialWithMoreDevice(): SerialEntity
    {
        return Serial::withCount(['hardwares'])->orderBy('hardwares_count', 'desc')->first();

    }

    public function getMostSerialWithMoreDeive(): collection
    {
        return Serial::withCount(['hardwares'])->orderBy('hardwares_count', 'desc')->take(10)->get();
    }
}