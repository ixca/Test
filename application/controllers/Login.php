<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
	/**
	 * Responsable for auto load the model
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model("login_model");

  	}
  	public function index(){
		if($this->session->logged_in){
			redirect("/");
		}
		$this->load->view("login/index.php");

 	}
	public function auth(){
		if($this->session->logged_in){
			redirect("/");
		}
		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$auth =  $this->login_model->auth_model($_POST["user_id"],$_POST["pass"]);
			if($auth){
				$login_data = array(
						'user_id'	=> $auth["id"],
						'username'	=> $auth["user_id"],
						'rol'     	=> $auth["rol_id"],
						'nomemp'	=> $auth["p_nombre"]." ".$auth["p_apellido"],
						'logged_in'	=> TRUE
				);
				// $this->debug->sD($login_data,true);
				$this->session->set_userdata($login_data);
				$objects = $this->get_objects($this->session->rol);
				$this->session->set_userdata("menu", $objects);
				redirect('/');

			}else{

				$this->session->set_flashdata('login_error', "contraseña o usuario incorrecto");
				redirect('/login');
			}

		}else{
			redirect("/login");
		}
	}
	public function get_objects($rol_id){
		if($rol_id == 1){
			 $objects = $this->login_model->all_objects();
		}else{
			$objects = $this->login_model->get_object_by_user_rol($rol_id);
		}

		return($objects);
	}

	public function logout(){
		session_destroy();
		redirect(base_url()."login");

	}
}
?>
