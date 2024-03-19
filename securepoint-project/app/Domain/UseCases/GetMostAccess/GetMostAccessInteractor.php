<?php

namespace App\Domain\UseCases\GetMostAccess;

use App\Domain\Interfaces\Access\AccessFactory;
use App\Domain\Interfaces\Access\AccessRepository;
use App\Domain\Interfaces\Serial\SerialRepository;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\GetMostAccess\GetMostAccessInputPort;
use Illuminate\Support\Facades\DB;

class GetMostAccessInteractor implements GetMostAccessInputPort
{
    public function __construct(
        private GetMostAccessOutputPort $output,
        private AccessRepository $repository,
        private AccessFactory $factory,
        private SerialRepository $repositorySerial,
    ) {
    }

    public function getMostAccess(): ViewModel
    {
        $mostAccess;
        $singleSerialWithMoreDevice;
        $mostSerialWithMoreDeive;
        try {
            $mostAccess = $this->repository->getMostAccess();
            $singleSerialWithMoreDevice = $this->repositorySerial->getSingleSerialWithMoreDevice()->toArray();
            $mostSerialWithMoreDeive = $this->repositorySerial->getMostSerialWithMoreDeive()->toArray();

        } catch (\Exception $e) {

        }

        return $this->output->GetMostAccess(
            new GetMostAccessResponseModel($mostAccess,$singleSerialWithMoreDevice,$mostSerialWithMoreDeive)
        );
    }
}
