<?php

namespace App\Http\Controllers\Upload;

use App\Adapters\ViewModels\HttpResponseViewModel;
use App\Domain\UseCases\UploadFile\UploadFileInputPort;
use App\Domain\UseCases\UploadFile\UploadFileRequestModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\File\UploadFileRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class UploadFileController extends Controller
{
    public function __construct(
        private UploadFileInputPort $interactor,
    ) {

    }

    public function __invoke(UploadFileRequest $request): ?HttpResponse
    {

        $viewModel = $this->interactor->retrieveFile(
            new UploadFileRequestModel($request->validated())
        );

        // we can't force the interactor to return an HttpResponseViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }

}
