<?php declare(strict_types = 1);

return [
	[
		'data' => [],
		'firstPage' => 1,
		'page' => 1,
		'itemsPerPage' => 1,
		'expected' => [],
		'expectedItemCount' => 0,
	],
	[
		'data' => [
			'foo' => 1,
			'goo' => 2,
			'hoo' => 3,
			'boo' => 4,
		],
		'firstPage' => 1,
		'page' => 1,
		'itemsPerPage' => 1,
		'expected' => [
			'foo' => 1,
		],
		'expectedItemCount' => 4,
	],
	[
		'data' => [
			'foo' => 1,
			'goo' => 2,
			'hoo' => 3,
			'boo' => 4,
		],
		'firstPage' => 1,
		'page' => 2,
		'itemsPerPage' => 1,
		'expected' => [
			'goo' => 2,
		],
		'expectedItemCount' => 4,
	],
	[
		'data' => [
			'foo' => 1,
			'goo' => 2,
			'hoo' => 3,
			'boo' => 4,
		],
		'firstPage' => 1,
		'page' => 1,
		'itemsPerPage' => 3,
		'expected' => [
			'foo' => 1,
			'goo' => 2,
			'hoo' => 3,
		],
		'expectedItemCount' => 4,
	],
	[
		'data' => [
			'foo' => 1,
			'goo' => 2,
			'hoo' => 3,
			'boo' => 4,
		],
		'firstPage' => 1,
		'page' => 2,
		'itemsPerPage' => 3,
		'expected' => [
			'boo' => 4,
		],
		'expectedItemCount' => 4,
	],
	[
		'data' => [
			'foo' => 1,
			'goo' => 2,
			'hoo' => 3,
			'boo' => 4,
		],
		'firstPage' => 1,
		'page' => 1,
		'itemsPerPage' => 5,
		'expected' => [
			'foo' => 1,
			'goo' => 2,
			'hoo' => 3,
			'boo' => 4,
		],
		'expectedItemCount' => 4,
	],
	[
		'data' => [
			'foo' => 1,
			'goo' => 2,
			'hoo' => 3,
			'boo' => 4,
		],
		'firstPage' => 1,
		'page' => 21,
		'itemsPerPage' => 5,
		'expected' => [
			'foo' => 1,
			'goo' => 2,
			'hoo' => 3,
			'boo' => 4,
		],
		'expectedItemCount' => 4,
	],
	[
		'data' => [
			'foo' => 1,
			'goo' => 2,
			'hoo' => 3,
			'boo' => 4,
		],
		'firstPage' => 12,
		'page' => 21,
		'itemsPerPage' => 5,
		'expected' => [
			'foo' => 1,
			'goo' => 2,
			'hoo' => 3,
			'boo' => 4,
		],
		'expectedItemCount' => 4,
	],
	[
		'data' => [
			'foo' => 1,
			'goo' => 2,
			'hoo' => 3,
			'boo' => 4,
		],
		'firstPage' => 121,
		'page' => 21,
		'itemsPerPage' => 5,
		'expected' => [
			'foo' => 1,
			'goo' => 2,
			'hoo' => 3,
			'boo' => 4,
		],
		'expectedItemCount' => 4,
	],
	[
		'data' => [
			'foo' => 1,
			'goo' => 2,
			'hoo' => 3,
			'boo' => 4,
		],
		'firstPage' => -121,
		'page' => -21,
		'itemsPerPage' => 5,
		'expected' => [
			'foo' => 1,
			'goo' => 2,
			'hoo' => 3,
			'boo' => 4,
		],
		'expectedItemCount' => 4,
	],
	[
		'data' => [
			'foo' => 1,
			'goo' => 2,
			'hoo' => 3,
			'boo' => 4,
			'foo1' => 1,
			'goo1' => 2,
			'hoo1' => 3,
			'boo1' => 4,
			'foo2' => 1,
			'goo2' => 2,
			'hoo2' => 3,
			'boo2' => 4,
		],
		'firstPage' => 1,
		'page' => 1,
		'itemsPerPage' => 4,
		'expected' => [
			'foo' => 1,
			'goo' => 2,
			'hoo' => 3,
			'boo' => 4,
		],
		'expectedItemCount' => 12,
	],
	[
		'data' => [
			'foo' => 1,
			'goo' => 2,
			'hoo' => 3,
			'boo' => 4,
			'foo1' => 1,
			'goo1' => 2,
			'hoo1' => 3,
			'boo1' => 4,
			'foo2' => 1,
			'goo2' => 2,
			'hoo2' => 3,
			'boo2' => 4,
		],
		'firstPage' => 1,
		'page' => 2,
		'itemsPerPage' => 4,
		'expected' => [
			'foo1' => 1,
			'goo1' => 2,
			'hoo1' => 3,
			'boo1' => 4,
		],
		'expectedItemCount' => 12,
	],
	[
		'data' => [
			'foo' => 1,
			'goo' => 2,
			'hoo' => 3,
			'boo' => 4,
			'foo1' => 1,
			'goo1' => 2,
			'hoo1' => 3,
			'boo1' => 4,
			'foo2' => 1,
			'goo2' => 2,
			'hoo2' => 3,
			'boo2' => 4,
		],
		'firstPage' => 1,
		'page' => 3,
		'itemsPerPage' => 4,
		'expected' => [
			'foo2' => 1,
			'goo2' => 2,
			'hoo2' => 3,
			'boo2' => 4,
		],
		'expectedItemCount' => 12,
	],
];
