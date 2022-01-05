<?php declare(strict_types = 1);

namespace Contributte\PaginatorControl\Tests;

require_once __DIR__ . '/../../vendor/autoload.php';

use Tester\Environment;
use function date_default_timezone_set;
use function dirname;

class Bootstrap
{

	public static function boot(): void
	{
				Environment::setup();
				date_default_timezone_set('Europe/Prague');
	}

	public static function getLibraryDir(): string
	{
		return dirname(dirname(__DIR__));
	}

}

Bootstrap::boot();
