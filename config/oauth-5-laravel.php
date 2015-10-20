<?php

return [

	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session',

	/**
	 * Consumers
	 */
	'consumers' => [

		'Facebook' => [
			'client_id'     => '615056238621832',
			'client_secret' => '9e6d9607d368318e15d5d588c5e4defa',
			'scope'         => ['email'],
		],

	]

];