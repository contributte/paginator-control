<?php declare(strict_types = 1);

namespace Contributte\PaginatorControl\Tests;

require_once __DIR__ . '/Bootstrap.php';

use Contributte\PaginatorControl\Examples\Providers\ArrayDataProvider;
use Contributte\PaginatorControl\PaginatorControl;
use Mockery;
use Nette\Application\UI\Control;
use Nette\Application\UI\Template;
use Nette\Application\UI\TemplateFactory;
use Nette\Utils\Paginator;
use Tester\Assert;
use Tester\TestCase;
use function assert;
use function count;

class PaginatorControlTest extends TestCase
{

	protected function tearDown(): void
	{
		parent::tearDown();
		Mockery::close();
	}

	/**
	 * @param array<int> $data
	 * @param array<int> $expected
	 *
	 * @dataProvider PaginatorControlTestPage.php
	 */
	public function testGetPage(
		array $data,
		int $itemsPerPage,
		int $firstPage,
		int $page,
		array $expected,
		int $relatedPages = 3,
	): void
	{
		$dataProvider = ArrayDataProvider::create($data);

		$paginatorControl = new PaginatorControl($dataProvider, $itemsPerPage, $firstPage, $relatedPages);
				$paginatorControl->page = $page;

		Assert::same($expected, $paginatorControl->getPage(), 'testGetPage failed');
	}

	/**
	 * @param array<int> $data
	 * @param array<string> $expected
	 *
	 * @dataProvider PaginatorControlTestRender.php
	 */
	public function testRender(
		array $data,
		int $itemsPerPage,
		int $firstPage,
		array $expected,
		string $filePath,
		int $relatedPages = 3,
	): void
	{
		$dataProvider = ArrayDataProvider::create($data);

		$paginatorControl = new PaginatorControl($dataProvider, $itemsPerPage, $firstPage, $relatedPages);

				$paginatorControl->setTemplateFile($filePath);

				$templateFactory = $this->getTemplateFactory($filePath);

		$paginatorControl->setTemplateFactory($templateFactory);

				$paginator = new Paginator();
		$paginator->setItemsPerPage($itemsPerPage);
		$paginator->setBase($firstPage);
				$paginator->setItemCount(count($data));
				$paginator->setPage(1);

		$paginatorControl->render();

				$template = $templateFactory->createTemplate();

				Assert::equal($paginator, $template->paginator, 'testRender failed');
				Assert::same($expected, $template->steps, 'testRender failed');
	}

	public function testRender2(): void
	{
		$dataProvider = ArrayDataProvider::create([]);

		$paginatorControl = new PaginatorControl($dataProvider, itemsPerPage: 0);

				$filePath = Bootstrap::getLibraryDir() . '\src/Examples/bootstrap4.latte';

				$templateFactory = $this->getTemplateFactory($filePath);

		$paginatorControl->setTemplateFactory($templateFactory);

		$paginatorControl->render();

				Assert::true(true);
	}

	private function getTemplateFactory(string $filePath): TemplateFactory
	{
		return new class($filePath) implements TemplateFactory {

			private Template $templateMock;

			public function __construct(private string $filePath,)
			{
				$this->templateMock = $this->getTemplateMock();
			}

			public function createTemplate(Control|null $control = null): Template
			{
				return $this->templateMock;
			}

			private function getTemplateMock(): Template
			{
				$retVal = Mockery::mock(Template::class)
					->shouldReceive('render')
					->once()
					->with($this->filePath)
					->getMock();
				assert($retVal instanceof Template);

				return $retVal;
			}

		};
	}

}

(new PaginatorControlTest())->run();
