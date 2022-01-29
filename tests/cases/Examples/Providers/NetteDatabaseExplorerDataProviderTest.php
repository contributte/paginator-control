<?php declare(strict_types = 1);

namespace Tests\Cases\Examples\Providers;

require_once __DIR__ . '/../../../bootstrap.php';

use Contributte\PaginatorControl\Examples\Providers\NetteDatabaseExplorerDataProvider;
use Mockery;
use Nette\Database\Table\Selection;
use Nette\Utils\Paginator;
use Tester\Assert;
use Tester\TestCase;
use function assert;

class NetteDatabaseExplorerDataProviderTest extends TestCase
{

	protected function tearDown(): void
	{
		parent::tearDown();
		Mockery::close();
	}

	public function testCreate(): void
	{
		$selectionMock = $this->getSelectionMock(times: 0, paginator: new Paginator());
		$dataProviderCreate = NetteDatabaseExplorerDataProvider::create($selectionMock);
		$dataProviderNew = new NetteDatabaseExplorerDataProvider($selectionMock);

		Assert::equal($dataProviderNew, $dataProviderCreate, 'testCreate failed');
	}

	/**
	 * @dataProvider ../../../fixtures/Examples/Providers/NetteDatabaseExplorerDataProviderTestPage.php
	 */
	public function testPage(
		int $itemsPerPage,
		int $itemCount,
		int $firstPage,
		int $page,
	): void
	{
		$paginator = new Paginator();
		$paginator->setItemsPerPage($itemsPerPage);
		$paginator->setBase($firstPage);
		$paginator->setPage($page);

		$paginator2 = clone $paginator;
		$paginator2->setItemCount($itemCount);

		$selectionMock = $this->getSelectionMock(
			times: 1,
			paginator: $paginator2,
		);

		$dataProvider = NetteDatabaseExplorerDataProvider::create(
			$selectionMock,
		);

		Assert::same(
			$selectionMock,
			$dataProvider->page($paginator),
			'testCreate failed',
		);

		Assert::same(
			$paginator->getItemCount(),
			$paginator2->getItemCount(),
			'testCreate failed',
		);
	}

	private function getSelectionMock(
		int $times,
		Paginator $paginator,
	): Selection
	{
		$retVal = Mockery::mock(Selection::class)
			->shouldReceive('count')
			->times($times)
			->with('*')
			->andReturn($paginator->getItemCount())
			->shouldReceive('limit')
			->times($times)
			->with($paginator->getLength(), $paginator->getOffset())
			->andReturnSelf()
			->getMock();
		assert($retVal instanceof Selection);

		return $retVal;
	}

}

(new NetteDatabaseExplorerDataProviderTest())->run();
