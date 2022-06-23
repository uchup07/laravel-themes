<?php

namespace Uchup07\LaravelThemes\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelThemes extends Facade {
    /**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'laravel-themes';
	}
}