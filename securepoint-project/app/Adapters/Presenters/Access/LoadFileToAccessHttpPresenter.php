<?php

namespace App\Adapters\Presenters\Access;

use App\Adapters\ViewModels\HttpResponseViewModel;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\LoadFileToAccess\LoadFileToAccessOutputPort;
use App\Domain\UseCases\LoadFileToAccess\LoadFileToAccessResponseModel;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;

class LoadFileToAccessHttpPresenter implements LoadFileToAccessOutputPort
{
    public function loadFileToAccess(LoadFileToAccessResponseModel $model): ViewModel
    {
        return new HttpResponseViewModel(
            app('redirect')
                ->route('uploads.showMostAccess')
        );
        
    }

    public function unableToLoadFileToAccess(LoadFileToAccessResponseModel $model, \Throwable $e): ViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new HttpResponseViewModel(
            app('redirect')
                ->route('pages.dashboard')
                ->withErrors(['getAll-movie' => "Error occured while retrieve movie {$model->retrieveFile()}"])
        );
    }
}
