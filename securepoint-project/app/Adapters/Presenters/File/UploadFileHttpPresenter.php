<?php

namespace App\Adapters\Presenters\File;

use App\Adapters\ViewModels\HttpResponseViewModel;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\UploadFile\UploadFileOutputPort;
use App\Domain\UseCases\UploadFile\UploadFileResponseModel;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;

class UploadFileHttpPresenter implements UploadFileOutputPort
{
    public function fileRetrieve(UploadFileResponseModel $model): ViewModel
    {
        return new HttpResponseViewModel(
            app('redirect')
                ->route('uploads.show')
                ->with(['uploadedFiles' => $model->retrieveFile()])
        );
    }

    public function unableToRetrieveFile(UploadFileResponseModel $model, \Throwable $e): ViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseViewModel(
            app('redirect')
                ->route('pages.dashboard')
                ->withErrors(['File' => "Error occured while retrieve movie {$model->retrieveFile()}"])
        );
    }
}
