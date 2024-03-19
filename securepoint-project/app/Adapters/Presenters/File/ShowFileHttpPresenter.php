<?php

namespace App\Adapters\Presenters\File;

use App\Adapters\ViewModels\HttpResponseViewModel;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\ShowFile\ShowFileOutputPort;
use App\Domain\UseCases\ShowFile\ShowFileResponseModel;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;

class ShowFileHttpPresenter implements ShowFileOutputPort
{
    public function getAllFile(ShowFileResponseModel $model): ViewModel
    {

        return new HttpResponseViewModel(
            app('view')
                ->make('pages.showFile')
                ->with(['uploadedFiles' => $model->getAllFile()])
        );
    }

    public function unableToGetAllFile(ShowFileResponseModel $model, \Throwable $e): ViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseViewModel(
            app('redirect')
                ->route('pages.dashboard')
                ->withErrors(['File' => "Error occured while retrieve movie {$model->getAllFile()}"])
        );
    }
}
