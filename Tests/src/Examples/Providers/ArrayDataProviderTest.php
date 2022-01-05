<?php declare(strict_types = 1);

namespace Contributte\PaginatorControl\Tests\Examples\Providers;

require_once __DIR__ . '/../../Bootstrap.php';

use Contributte\PaginatorControl\Examples\Providers\ArrayDataProvider;
use Nette\Utils\Paginator;
use Tester\Assert;
use Tester\TestCase;

class ArrayDataProviderTest extends TestCase
{

	public function testCreate(): void
	{
			$dataProviderCreate = ArrayDataProvider::create([]);
			$dataProviderNew = new ArrayDataProvider([]);

			Assert::equal($dataProviderNew, $dataProviderCreate, 'testCreate failed');
	}

	/**
	 * @param array<int> $data
	 * @param array<int> $expected
	 *
	 * @dataProvider ArrayDataProviderTestPage.php
	 */
	public function testPage(
		array $data,
		int $itemsPerPage,
		int $firstPage,
		int $page,
		int $expectedItemCount,
		array $expected,
	): void
	{
			$dataProvider = ArrayDataProvider::create($data);

			$paginator = new Paginator();
			$paginator->setItemsPerPage($itemsPerPage);
			$paginator->setBase($firstPage);
			$paginator->setPage($page);

			Assert::same($expected, $dataProvider->page($paginator), 'testPage failed');
			Assert::same($expectedItemCount, $paginator->getItemCount(), 'testPage failed');
	}

}

(new ArrayDataProviderTest())->run();
