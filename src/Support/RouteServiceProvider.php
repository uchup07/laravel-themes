<?php

namespace Uchup07\LaravelThemes\Support;

use Uchup07\LaravelThemes\Concerns\GetsManifest;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as LaravelRouteServiceProvider;

class RouteServiceProvider extends LaravelRouteServiceProvider
{
    use GetsManifest;
}