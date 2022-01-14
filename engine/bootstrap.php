<?php

	/**
	 * OpenArtSite | Apache-2.0 License | © OpenArtSite.io 2022
	 */
	
	class Bootstrap extends \Yaf_Bootstrap_Abstract {
		public function _initComposer(\Yaf_Dispatcher $dispatcher) {
			/**
			 * Load composer modules
			 */
			\Yaf_Loader::import(APPLICATION_PATH . "/vendor/autoload.php");
		}

		public function _initDatabase(\Yaf_Dispatcher $dispatcher) {
			/**
			 * Load database config
			 */
			$config = \Yaf_Application::app()
				->getConfig()
				->get("database");
			
			/**
			 * Connect to the MySQL database
			 */
			$database = new \PDO(
				            ($config["primary"]["driver"]   ?? "mysql") . ":" .
				"host=" .   ($config["primary"]["host"]     ?? "127.0.0.1") . ";" .
				"port=" .   ($config["primary"]["port"]     ?? "3306") . ";" .
				"dbname=" . ($config["primary"]["dbname"]   ?? "database"),
				            ($config["primary"]["username"] ?? "root"),
				            ($config["primary"]["password"] ?? ""),
							($config["primary"]["options"]  ?? [
								\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
								\PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
								\PDO::ATTR_ORACLE_NULLS       => \PDO::NULL_TO_STRING,
							])
			);

			/**
			 * Save database connection reference
			 */
			\Yaf_Registry::set("database", $database);
		}

		public function _initSession(\Yaf_Dispatcher $dispatcher) {
			/**
			 * Start a new session
			 */
			\Yaf_Session::getInstance()->start();
		}

		public function _initRouter(\Yaf_Dispatcher $dispatcher) {
			/**
			 * Change the application directory to the /public/ folder
			 */
			$dispatcher->getApplication()->setAppDirectory(APPLICATION_PATH . "/public");

			/**
			 * Get the router instance
			 */
			$router = $dispatcher->getRouter();

			/**
			 * Define admin routes
			 */
			$router->addRoute(
				"admin",
				new \Yaf_Route_Rewrite(
					"/admin/*",
					[
						"controller" => "admin",
					],
				)
			);

			/**
			 * If there are user-defined routes
			 */
			if (!empty($config["routes"])) {
				/**
				 * Register the routes
				 */
				$router->addConfig($config["routes"]);
			}
		}
	 }
