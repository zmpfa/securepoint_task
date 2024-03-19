<?php

namespace App\Http\Controllers\GetMostAccess;

use App\Adapters\ViewModels\HttpResponseViewModel;
use App\Domain\UseCases\GetMostAccess\GetMostAccessInputPort;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class GetMostAccessController extends Controller
{
    public function __construct(
        private GetMostAccessInputPort $interactor,
    ) {
    }

    public function __invoke(): ?HttpResponse
    {

        $viewModel = $this->interactor->getMostAccess();
        // we can't force the interactor to return an HttpResponseViewModel
        // so we need a simple check (or PHPStan will yell)
        if ($viewModel instanceof HttpResponseViewModel) {
            return $viewModel->getResponse();
        }

        return null;
    }
}
