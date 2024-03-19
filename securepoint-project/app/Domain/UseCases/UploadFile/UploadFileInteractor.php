<?php

namespace App\Domain\UseCases\UploadFile;

use App\Domain\Interfaces\File\FileFactory;
use App\Domain\Interfaces\File\FileRepository;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\UploadFile\UploadFileInputPort;

class UploadFileInteractor implements UploadFileInputPort
{
    public function __construct(
        private UploadFileOutputPort $output,
        private FileRepository $repository,
        private FileFactory $factory,
    ) {
    }

    public function retrieveFile(UploadFileRequestModel $request): ViewModel
    {
        $file = $this->factory->make([
            'file_name' => $request->getFile()->getClientOriginalName(),
            'original_name' => $request->getFile()->getClientOriginalName(),
            'file_path' => $request->getFile()->store('uploads', 'public'),
        ]);

        try {
            $file = $this->repository->create($file);
        } catch (\Exception $e) {
            return $this->output->unableToRetrieveFile(new UploadFileResponseModel($file), $e);
        }

        return $this->output->fileRetrieve(
            new UploadFileResponseModel($file)
        );
    }
}
