<?php declare(strict_types = 1);

namespace Contributte\PaginatorControl;

use Countable;
use Nette\Application\Attributes\Persistent;
use Nette\Application\UI\Control;
use Nette\Utils\Paginator;
use Traversable;
use function array_unique;
use function array_values;
use function max;
use function min;
use function range;
use function round;
use function sort;

class PaginatorControl extends Control
{

	#[Persistent] public int $page = 1;

	private string $templateFile = __DIR__ . '/Examples/bootstrap4.latte';

		/** @var Traversable<mixed>|Countable|array<mixed> */
	private mixed $paginated = null;

	private Paginator $paginator;

	public function __construct(
		private PaginatorDataProvider $dataProvider,
		int $itemsPerPage,
		int $firstPage = 1,
		private int $relatedPages = 3,
	)
	{
		$this->paginator = new Paginator();
		$this->paginator->setItemsPerPage($itemsPerPage);
		$this->paginator->setBase($firstPage);
		if ($this->relatedPages < 0) {
			$this->relatedPages = 0;
		}
	}

	public function render(): void
	{
		$this->getPage(); // Because of getting last page info

		$this->template->paginator = $this->paginator;
		$this->template->steps = $this->getSteps();

		$this->template->render($this->templateFile);
	}

	public function setTemplateFile(string $file): void
	{
		$this->templateFile = $file;
	}

	/**
	 * @return Traversable<mixed>|Countable|array<mixed>
	 */
	public function getPage(): Traversable|Countable|array
	{
		if (!$this->paginated) {
			$this->paginator->setPage($this->page);
			$this->paginated = $this->dataProvider->page($this->paginator);
		}

		return $this->paginated;
	}

	/**
	 * @return array<int>
	 */
	private function getSteps(): array
	{
		$pageCount = $this->paginator->getPageCount();
		$page = $this->paginator->getPage();
		$firstPage = $this->paginator->getFirstPage();
		$lastPage = $this->paginator->getLastPage();

		if ($pageCount < 2) {
			$steps = [$page];
		} else {
			$arr = range(
				(int) max($firstPage, $page - $this->relatedPages),
				(int) min($lastPage, $page + $this->relatedPages),
			);
			$count = 4;
			$quotient = ($pageCount - 1) / $count;

			for ($i = 0; $i <= $count; $i++) {
				$arr[] = (int) (round($quotient * $i) + $firstPage);
			}

			sort($arr);

			$steps = array_values(array_unique($arr));
		}

		return $steps;
	}

}
