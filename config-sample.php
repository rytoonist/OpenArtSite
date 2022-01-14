<?php

	/**
	 * Remember to rename this file to 'config.php'
	 * after you have added your own config information
	 */

	return [
		"database" => [
			"primary" => [
				"driver" => "mysql",
				"host" => "oas-db",
				"port" => 3306,
				"dbname" => "my_art_site",
				"username" => "root",
				"password" => "",
			],
		],
		"routes" => [
			"artwork" => [
				"type" => "rewrite",
				"match" => "/:username/gallery/:slug",
				"route" => [
					"controller" => "artwork",
					"action"     => "view",
				],
			],
		],
	];
