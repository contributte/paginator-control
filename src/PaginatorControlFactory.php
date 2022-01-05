<?php declare(strict_types = 1);

namespace Contributte\PaginatorControl;

interface PaginatorControlFactory
{

	/**
	 * @param PaginatorDataProvider $dataProvider This data provider provides data for paginating and implements 'page' method
	 * @param int $itemsPerPage How many items should be displayed on one page.
	 * @param int $firstPage First page number
	 * @param int $relatedPages The range of pages around the current page, rendered in 1 page increments.
	 */
	public function create(
		PaginatorDataProvider $dataProvider,
		int $itemsPerPage,
		int $firstPage = 1,
		int $relatedPages = 3,
	): PaginatorControl;

}
