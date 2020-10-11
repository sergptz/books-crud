<?php

namespace App\Providers;

use App\Contracts\ExportDataHandlerService;
use App\Contracts\ExportService;
use App\Services\ExcelExportDataHandlerService;
use App\Services\ExcelExportService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ExportService::class, ExcelExportService::class);
        $this->app->bind(ExportDataHandlerService::class, ExcelExportDataHandlerService::class);
    }
}
