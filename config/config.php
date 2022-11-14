<?php
return [
	/**
	 * you can add your personnel configs here, after the framework configs
	 */
	'view' => ['cache' => true], // if disabled, it became harder to debug in case of a problem in the view
	'session' => [
		'salt' => 'ankhs', // salt for the key of flash message to avoid getting overwritten by a dev
		'csrf' => 90 // csrf tokens expiration time in minutes
	]
];
