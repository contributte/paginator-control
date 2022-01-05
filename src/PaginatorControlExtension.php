<?php declare(strict_types = 1);

namespace Contributte\PaginatorControl;

use Nette\DI\CompilerExtension;

class PaginatorControlExtension extends CompilerExtension
{

	public function loadConfiguration(): void
	{
		$this->compiler->loadDefinitionsFromConfig(
			$this->loadFromFile(__DIR__ . '/config/common.neon')['services'],
		);
	}

}
