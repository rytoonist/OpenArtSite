<?php

	/**
	 * OpenArtSite | Apache-2.0 License | © OpenArtSite.io 2022
	 */

	class notfoundController extends \Yaf_Controller_Abstract {
		public function indexAction() {
			$this->getView()->page_title = "404 Not Found";
		}
	}
