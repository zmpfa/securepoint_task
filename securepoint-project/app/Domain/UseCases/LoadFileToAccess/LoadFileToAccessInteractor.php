<?php

namespace App\Domain\UseCases\LoadFileToAccess;

use App\Domain\Interfaces\Access\AccessFactory;
use App\Domain\Interfaces\Access\AccessRepository;
use App\Domain\Interfaces\File\FileFactory;
use App\Domain\Interfaces\Hardware\HardwareFactory;
use App\Domain\Interfaces\Hardware\HardwareRepository;
use App\Domain\Interfaces\Serial\SerialFactory;
use App\Domain\Interfaces\Serial\SerialRepository;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\LoadFileToAccess\LoadFileToAccessInputPort;
use Illuminate\Support\Facades\Storage;

class LoadFileToAccessInteractor implements LoadFileToAccessInputPort
{
    public function __construct(
        private LoadFileToAccessOutputPort $output,
        private AccessRepository $repository,
        private AccessFactory $factory,
        private FileFactory $factoryFile,
        private HardwareRepository $repositoryHardware,
        private HardwareFactory $factoryHardware,
        private SerialRepository $repositorySerial,
        private SerialFactory $factorySerial,
    ) {
    }

    public function loadFileToAccess(LoadFileToAccessRequestModel $request): ViewModel
    {

        $file = $this->factoryFile->get([
            'file_id' => $request->getFileId(),
            'file_name' => $request->getFileName(),
            'original_name' => $request->getOriginalName(),
            'file_path' => $request->getfilePath(),
        ]);

        try {
            //Start Read File from Storage
            $content = fopen(Storage::path($file->getfilePath()), 'r');

            $line2 = [];
            $line3 = [];

            while (!feof($content)) {
                //Get each Line
                $line = fgets($content);
                // seperate Line by space
                $linearray = explode(' ', $line);
                //create a Factory object
                $data = $this->factory->make([
                    'public_ip' => $linearray[0] ?? null,
                    'name_update_server' => $linearray[1] ?? null,
                    'date_time' => $linearray[2] ?? null,
                    'url_http_protocol_version' => $linearray[4] ?? null,
                    'http_response' => $linearray[6] ?? null,
                    'size_response' => $linearray[7] ?? null,
                    'name_proxy' => $linearray[8] ?? null,
                    'request_time' => $linearray[9] ?? null,
                    'serial' => $linearray[10] ?? null,
                    'firmware_version' => $linearray[11] ?? null,
                    'specs' => $linearray[12] ?? null,
                    'not_after' => 'null',
                    'remaining_days' => 'null',
                ]);
                \Log::info($data->getSpecs());
                //Decode specs field
                $decodeInBase64 = (base64_decode($data->getSpecs()));
                $decodeInGzip = gzdecode($decodeInBase64);
                $decodeInJson = json_decode($decodeInGzip, true);
                //Create a Factory object
                $dataHardware = $this->factoryHardware->make($decodeInJson);
                //Push object in Array
                array_push($line3, $dataHardware);
                array_push($line2, $data);
            }
            fclose($content);

            //Place Object in Database
            $dataAllNewAccess = $this->repository->create($line2);
            $dataAllNewHardWare = $this->repositoryHardware->make($line3, $dataAllNewAccess);
            $this->repositorySerial->make($dataAllNewAccess, $dataAllNewHardWare);
        } catch (\Exception $e) {
            return $this->output->unableToLoadFileToAccess(new LoadFileToAccessResponseModel($file), $e);
        }

        return $this->output->loadFileToAccess(
            new LoadFileToAccessResponseModel($file)
        );
    }
}
