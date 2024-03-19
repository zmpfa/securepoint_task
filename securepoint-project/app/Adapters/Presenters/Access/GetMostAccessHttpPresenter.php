<?php

namespace App\Adapters\Presenters\Access;

use App\Adapters\ViewModels\HttpResponseViewModel;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\GetMostAccess\GetMostAccessOutputPort;
use App\Domain\UseCases\GetMostAccess\GetMostAccessResponseModel;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;

class GetMostAccessHttpPresenter implements GetMostAccessOutputPort
{
    public function getMostAccess(GetMostAccessResponseModel $model): ViewModel
    {
        $resource =array_chunk($model->getMostAccess(),3);
        return new HttpResponseViewModel(
            app('view')
                ->make('pages.showMostAccess')
                ->with(['access' => $resource[0][0],
                        'serialSingle' => $resource[0][1],
                        'serialMost' => $resource[0][2],
                ])
        );
    }

    public function unableToGetMostAccess(GetMostAccessResponseModel $model, \Throwable $e): ViewModel
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
