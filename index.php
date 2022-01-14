<?php

	/**
	 * OpenArtSite | Apache-2.0 License | © OpenArtSite.io 2022
	 */
	
	namespace Engine;

	/**
	 * Use the directory structure of this project as a PHP namespace
	 */
	\spl_autoload_register();

	/**
	 * Define the main application path
	 */
	\define("APPLICATION_PATH", __DIR__);

	/**
	 * Run the bootstrap
	 */
	(new \Yaf_Application(\array_merge_recursive(require_once __DIR__ . "/config.php", [
		"application" => [
			"directory" => APPLICATION_PATH . "/engine",
		],
	])))
		->bootstrap()
		->run();
