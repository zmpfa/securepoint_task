<?php

namespace App\Providers;

use App\Adapters\Presenters;
use App\Domain;
use App\Domain\UseCases;
use App\Factories;
use App\Http\Controllers as HttpControllers;
use App\Repositories;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // wire the FileFactory with FileModelFactory
        $this->app->bind(
            Domain\Interfaces\File\FileFactory::class,
            Factories\File\FileModelFactory::class,
        );

        // wire the FileRepository with FileDatabaseRepository
        $this->app->bind(
            Domain\Interfaces\File\FileRepository::class,
            Repositories\File\FileDatabaseRepository::class,
        );

        // wire the AccessFactory with AccessModelFactory
        $this->app->bind(
            Domain\Interfaces\Access\AccessFactory::class,
            Factories\Access\AccessModelFactory::class,
        );

        // wire the AccessRepository with AccessDatabaseRepository
        $this->app->bind(
            Domain\Interfaces\Access\AccessRepository::class,
            Repositories\Access\AccessDatabaseRepository::class,
        );

        // wire the HardwareFactory with HardwareModelFactory
        $this->app->bind(
            Domain\Interfaces\Hardware\HardwareFactory::class,
            Factories\Hardware\HardwareModelFactory::class,
        );

        // wire the HardwareRepository with HardwareDatabaseRepository
        $this->app->bind(
            Domain\Interfaces\Hardware\HardwareRepository::class,
            Repositories\Hardware\HardwareDatabaseRepository::class,
        );

        // wire the SerialRepository with SerialDatabaseRepository
        $this->app->bind(
            Domain\Interfaces\Serial\SerialFactory::class,
            Factories\Serial\SerialModelFactory::class,
        );

        // wire the SerialRepository with SerialDatabaseRepository
        $this->app->bind(
            Domain\Interfaces\Serial\SerialRepository::class,
            Repositories\Serial\SerialDatabaseRepository::class,
        );
        // wire the Upload UseCases with Interactor Upload
        $this->app
            ->when(HttpControllers\Upload\UploadFileController::class)
            ->needs(UseCases\UploadFile\UploadFileInputPort::class)
            ->give(function ($app) {
                return $app->make(UseCases\UploadFile\UploadFileInteractor::class, [
                    'output' => $app->make(Presenters\File\UploadFileHttpPresenter::class),
                ]);
            });
        // wire the ShowFile UseCases with Interactor ShowFile
        $this->app
            ->when(HttpControllers\ShowFile\ShowFileController::class)
            ->needs(UseCases\ShowFile\ShowFileInputPort::class)
            ->give(function ($app) {
                return $app->make(UseCases\ShowFile\ShowFileInteractor::class, [
                    'output' => $app->make(Presenters\File\ShowFileHttpPresenter::class),
                ]);
            });
        // wire the LoadFileToAccess UseCases with Interactor LoadFileToAccess
        $this->app
            ->when(HttpControllers\LoadFileToAccess\LoadFileToAccessController::class)
            ->needs(UseCases\LoadFileToAccess\LoadFileToAccessInputPort::class)
            ->give(function ($app) {
                return $app->make(UseCases\LoadFileToAccess\LoadFileToAccessInteractor::class, [
                    'output' => $app->make(Presenters\Access\LoadFileToAccessHttpPresenter::class),
                ]);
            });
        // wire the LoadFileToAccess GetMostAccess with Interactor GetMostAccess
        $this->app
            ->when(HttpControllers\GetMostAccess\GetMostAccessController::class)
            ->needs(UseCases\GetMostAccess\GetMostAccessInputPort::class)
            ->give(function ($app) {
                return $app->make(UseCases\GetMostAccess\GetMostAccessInteractor::class, [
                    'output' => $app->make(Presenters\Access\GetMostAccessHttpPresenter::class),
                ]);
            });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
