<?php

namespace App\Http\Controllers\ShowFile;

use App\Adapters\ViewModels\HttpResponseViewModel;
use App\Domain\UseCases\ShowFile\ShowFileInputPort;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class ShowFileController extends Controller
{
    public function __construct(
        private ShowFileInputPort $interactor,
    ) {

    }

    public function __invoke(): ?HttpResponse
    {

        $viewModel = $this->interactor->getAllFile();

        // we can't force the interactor to return an HttpResponseViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }

}
