<?php

	/**
	 * OpenArtSite | Apache-2.0 License | © OpenArtSite.io 2022
	 */

  final class Bootstrap {
    /**
     * Whether the engine has been initialized yet
     * @var bool
     */
    private static bool $init = false;
    
    /**
     * Initialize the engine
     */
    public static function init() {
      // If the engine has already been initialized, cancel initialization
      if (static::$init) {
        return;
      }
      
      // Initialize the engine
      static::$init = true;
      
      // Load options from the config file - expects an associative array
      $config = require_once __DIR__ . "/../config.php";
      
      // ...
    }
    
    /**
     * Upon engine destruction, collect garbage and save any important config changes
     */
    public function __destruct() {
      // ...
    }
    
    /**
     * This is a static class and cannot be instantiated
     */
    private function __construct() {}
  }
