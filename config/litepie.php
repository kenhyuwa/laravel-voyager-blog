<?php

/**
 * Define your Application in here
 * You can setup on .env or create new setting (site) on Admin Panel
 */

return [
	'controllers' => [
		'namespace' => 'Ken\\Blog\\Http\\Controllers',
	],
	'assets_path' => '/vendor/litepie',
	/**
	 * Your Application Title
	 */
	'name' => env('LITEPIE_NAME', 'litepie'),

	/**
	 * Your Application Title
	 */
	'app_name' => env('LITEPIE_APP_NAME', 'lite<span>pie</span>'),

	/**
	 * Your Application Description
	 */
	'description' => env('LITEPIE_DESCRIPTION', 'Tutorial Laravel Indonesia'),

	/**
	 * Local building the App
	 */
	'building' => env('LITEPIE_BUILDING', 'Jogjakarta, Indonesia'),
];