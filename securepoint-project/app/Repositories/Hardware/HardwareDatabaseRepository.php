<?php

namespace App\Repositories\Hardware;

use App\Domain\Interfaces\Hardware\HardwareRepository;
use App\Models\Hardware;
use Illuminate\Support\Collection;

class HardwareDatabaseRepository implements HardwareRepository
{

    public function make(array $hardware): collection
    {
        $data = collect();
        foreach ($hardware as $key => $value) {
            $dataHardware = Hardware::create([
                'mac' => $value->getMac() ?? null,
                'architecture' => $value->getArchitecture() ?? null,
                'machine' => $value->getMachine() ?? null,
                'mem' => $value->getMem() ?? null,
                'cpu' => $value->getCpu() ?? null,
                'disk_root' => $value->getDiskRoot() ?? null,
                'disk_data' => $value->getDiskData() ?? null,
                'uptime' => $value->getUpTime() ?? null,
                'fwversion' => $value->fwversion ?? null,
                'l2tp' => $value->l2tp ?? 'DOWN',
                'qos' => $value->qos ?? 0,
                'httpaveng' => $value->httpaveng ?? null,
                'spcf' => $value->spcf ?? 0,
                'footer' => $value->getFooter() ?? false,
            ]);
            $data->add($dataHardware);
        }

        return $data;
    }

}
