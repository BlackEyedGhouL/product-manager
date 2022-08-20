<?php

namespace domain\Facades;

use Illuminate\Support\Facades\Facade;
use domain\Services\DashboardService;

class DashboardFacade extends Facade {

    protected static function getFacadeAccessor() {
        return DashboardService::class;
    }
}
