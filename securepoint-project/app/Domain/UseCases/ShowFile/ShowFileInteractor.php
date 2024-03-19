<?php

namespace App\Domain\UseCases\ShowFile;

use App\Domain\Interfaces\File\FileFactory;
use App\Domain\Interfaces\File\FileRepository;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\ShowFile\ShowFileInputPort;

class ShowFileInteractor implements ShowFileInputPort
{
    public function __construct(
        private ShowFileOutputPort $output,
        private FileRepository $repository,
        private FileFactory $factory,
    ) {
    }

    public function getAllFile(): ViewModel
    {

        $file;

        try {
            $file = $this->repository->getFile();
        } catch (\Exception $e) {
            return $this->output->unableToRetrieveFile(new ShowFileResponseModel($file), $e);
        }

        return $this->output->getAllFile(
            new ShowFileResponseModel($file)
        );
    }
}
