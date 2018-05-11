<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Index extends CI_Controller {
	public function __construct(){
		parent::__construct();

		if(!$this->session->logged_in){
			redirect("/login");
		}
	
	}
	public function index(){

		// $this->debug->sD($this->session);
		$this->load->view("template");

	}
	public function access_forbiden(){
		$data["main_content"] = "access_forbiden";
		$data["heading"] = "404 Page Not Found";
		$data["message"] = "The page you requested was not found.";
		$this->load->view("template",$data);
	}

}
?>
