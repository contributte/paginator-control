<?php declare(strict_types = 1);

return [
	[
		'data' => [
			'foo' => 3,
		],
		'itemsPerPage' => 1,
		'firstPage' => 1,
		'page' => 1,
		'expected' => [
			'foo' => 3,
		],
	],
	[
		'data' => [
			'foo' => 3,
			'hoo' => 3,
		],
		'itemsPerPage' => 3,
		'firstPage' => -3,
		'page' => 1,
		'expected' => [
			'foo' => 3,
			'hoo' => 3,
		],
	],
	[
		'data' => [
			'foo' => 3,
			'hoo' => 3,
			'boo' => 3,
		],
		'itemsPerPage' => 3,
		'firstPage' => 3,
		'page' => 1,
		'expected' => [
			'foo' => 3,
			'hoo' => 3,
			'boo' => 3,
		],
	],
	[
		'data' => [
			'foo' => 3,
		],
		'itemsPerPage' => 1,
		'firstPage' => 1,
		'page' => 1,
		'relatedPages' => 2,
		'expected' => [
			'foo' => 3,
		],
	],
	[
		'data' => [
			'foo' => 3,
		],
		'itemsPerPage' => 1,
		'firstPage' => 1,
		'page' => 1,
		'relatedPages' => -2,
		'expected' => [
			'foo' => 3,
		],
	],
	[
		'data' => [
			'foo' => 3,
		],
		'itemsPerPage' => 1,
		'firstPage' => 1,
		'page' => 1,
		'relatedPages' => 23,
		'expected' => [
			'foo' => 3,
		],
	],
	[
		'data' => [
			'foo' => 3,
			'hoo' => 3,
			'boo' => 3,
		],
		'itemsPerPage' => 2,
		'firstPage' => 1,
		'page' => 1,
		'expected' => [
			'foo' => 3,
			'hoo' => 3,
		],
	],
	[
		'data' => [
			'foo' => 3,
			'hoo' => 3,
			'yoo' => 3,
		],
		'itemsPerPage' => 2,
		'firstPage' => 1,
		'page' => 2,
		'expected' => [
			'yoo' => 3,
		],
	],
	[
		'data' => [
			'foo' => 3,
			'hoo' => 3,
			'boo' => 3,
		],
		'itemsPerPage' => 2,
		'firstPage' => 2,
		'page' => 2,
		'expected' => [
			'foo' => 3,
			'hoo' => 3,
		],
	],
	[
		'data' => [
			'foo' => 3,
			'hoo' => 3,
			'yoo' => 3,
		],
		'itemsPerPage' => 2,
		'firstPage' => 2,
		'page' => 3,
		'expected' => [
			'yoo' => 3,
		],
	],
];
