<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chargeassets {
	private $arrayInfo;
	public function __construct(){

	}
	public function convertJs($url=null){
		if($url != NULL){
			$this->arrayInfo = $url;
			foreach($this->arrayInfo as $item ){
				echo '<script type="text/javascript" src="'.base_url("assets/".$item).'"> </script>';
			}
			$this->arrayInfo = null;
		}
	}
	public function convertCss($url=null){
		if($url != NULL){
			$this->arrayInfo = $url;
			foreach($this->arrayInfo as $item ){
				echo '<link href="'.base_url("assets/".$item).'" rel="stylesheet">';
			}
			$this->arrayInfo = null;
		}
	}
}
?>
