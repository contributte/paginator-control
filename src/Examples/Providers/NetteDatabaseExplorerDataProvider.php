<?php declare(strict_types = 1);

namespace Contributte\PaginatorControl\Examples\Providers;

use Contributte\PaginatorControl\PaginatorDataProvider;
use Countable;
use Nette\Database\Table\Selection;
use Nette\SmartObject;
use Nette\Utils\Paginator;
use Traversable;

class NetteDatabaseExplorerDataProvider implements PaginatorDataProvider
{

	use SmartObject;

	public function __construct(private Selection $selection,)
	{
	}

	public static function create(Selection $selection,): self
	{
		return new self($selection);
	}

	/**
	 * @return Traversable<mixed>|Countable|array<mixed>
	 */
	public function page(Paginator $paginator): Traversable|Countable|array
	{
		$numOfItems = $this->selection->count('*');
		$paginator->setItemCount($numOfItems);

		return $this->selection
			->limit(
				$paginator->getLength(),
				$paginator->getOffset(),
			);
	}

}
