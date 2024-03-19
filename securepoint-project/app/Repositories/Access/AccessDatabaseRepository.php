<?php

namespace App\Repositories\Access;

use App\Domain\Interfaces\Access\AccessRepository;
use App\Models\Access;
use Illuminate\Support\Collection;

class AccessDatabaseRepository implements AccessRepository
{

    public function create(array $access): collection
    {
        $dataCollection = collect();
        foreach ($access as $accees) {

            $data = Access::create([
                'public_ip' => $accees->getPublicIp(),
                'name_update_server' => $accees->getNameUpdateServer(),
                'date_time' => $accees->date_time,
                'url_http_protocol_version' => $accees->getUrlHttpProtocolVersion(),
                'http_response' => $accees->getHttpResponse(),
                'size_response' => $accees->getSizeResponse(),
                'name_proxy' => $accees->getNameProxy(),
                'request_time' => $accees->getRequestTime(),
                'serial' => $accees->getSerial(),
                'firmware_version' => $accees->getFirmwareVersion(),
                'specs' => $accees->getSpecs(),
                'not_after' => $accees->getNotAfter(),
                'remaining_days' => $accees->getRemainingDays(),
            ]);

            $dataCollection->add($data);
        }
        return $dataCollection;
    }

    public function getMostAccess(): array
    {
        return Access::select('serial')
            ->selectRaw('COUNT(*) AS count')
            ->groupBy('serial')
            ->orderByDesc('count')
            ->limit(10)
            ->get()->toArray();
    }
}
