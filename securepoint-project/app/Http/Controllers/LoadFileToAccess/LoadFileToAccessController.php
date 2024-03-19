<?php

namespace App\Http\Controllers\LoadFileToAccess;

use App\Adapters\ViewModels\HttpResponseViewModel;
use App\Domain\UseCases\LoadFileToAccess\LoadFileToAccessInputPort;
use App\Domain\UseCases\LoadFileToAccess\LoadFileToAccessRequestModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\File\LoadFileRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse ;

class LoadFileToAccessController extends Controller
{
    public function __construct(
        private LoadFileToAccessInputPort $interactor,
    ) {
    }

    public function __invoke(LoadFileRequest $request): ?HttpResponse
    {

        $viewModel = $this->interactor->loadFileToAccess(
            new LoadFileToAccessRequestModel($request->validated()));
        // we can't force the interactor to return an HttpResponseViewModel
        // so we need a simple check (or PHPStan will yell)
        
        if ($viewModel instanceof HttpResponseViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
