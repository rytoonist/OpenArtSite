<?php

	/**
	 * OpenArtSite | Apache-2.0 License | © OpenArtSite.io 2022
	 */

	class artworkController extends \Yaf_Controller_Abstract {
		public function viewAction() {
			$this->getView()->page_title = "Artwork View Page";
		}
	}
