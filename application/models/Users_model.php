<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Users_model extends CI_Model{
		public function __construct(){
			parent::__construct();
		}
		public function get_users($codpai){
			$this->db->select("u.id id, u.user_id user_id, u.password password, u.rol_id, u.sta, sd.nombre as sede");
			//$this->db->select("e.nomape emp_key");
			$this->db->select("u.p_nombre, u.s_nombre, u.p_apellido, u.s_apellido");
			$this->db->select("r.nombre rol");
			$this->db->from("users u");
			//$this->db->join("proval.empmae e","u.emp_key = e.keyemp","inner");
			$this->db->join("roles r","u.rol_id = r.id","inner");
			$this->db->join("sede sd","sd.id = u.idsede","inner");
			$this->db->where("u.codpai",$codpai);
			$resultado = $this->db->get();
			return $resultado->result_array();
		}
//-----------YA NO HAY CONEXION A PROVALCORE
		// public function get_usersPc3($codpai, $user){
		// 	$this->db = $this->load->database("pc3", TRUE);
		// 	$this->db->select("Usuario,Clave,Pais,PerfilProvalcore");
		// 	$this->db->from("seg_usuario");
		// 	$this->db->where("Usuario",$user);
		// 	$this->db->or_where('Usuario', $user."_ITEMS");
		// 	$this->db->where("PerfilProvalcore","PROVAL_ITEMS");
		// 	$resultado = $this->db->get();
		// 	return $resultado->result_array();
		// }
		public function get_roles($codpai){
			$this->db->select("id, nombre, descripcion");
			$this->db->from("roles");
			$this->db->where("codpai",$codpai);
			$this->db->where("id >","1");
			$resultado = $this->db->get();
			return $resultado->result_array();
		}
		public function datos_users($id){
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('id',$id);
			$result = $this->db->get();
			return $result->result_array();
		}
		public function update_users($data){
			$this->db = $this->load->database("default", TRUE);
			//$this->db->where('id',$data["id"]."_ITEMS");
			$this->db->where('id',$data["id"]);
			$this->db->update('users', $data);
			$report = $this->db->error();
			if($report !== 0){
				return true;
			}else{
				return false;
			}
		}
		//-----------YA NO HAY CONEXION A PROVALCORE
		// public function updatepc3_users($data){
		// 	$this->db = $this->load->database("pc3", TRUE);
		// 	//$this->db->where('Usuario',$data["Usuario"]);
		// 	$this->db->where('Usuario',$data["Usuario"]);
		// 	//unset($data["Usuario"]);
		// 	$this->db->update('seg_usuario', $data);
		// 	$report = $this->db->error();
		// 	if($report !== 0){
		// 		return true;
		// 	}else{
		// 		return false;
		// 	}
		// }
		public function insert_users($data){
			$this->db = $this->load->database("default", TRUE);
			$this->db->insert('users', $data);
			$report = $this->db->error();
			if($report !== 0){
				return true;
			}else{
				return false;
			}
		}

		// $this->db = $this->load->database("default", TRUE);
		public function insert_users2($data){
			$this->db = $this->load->database("pc3", TRUE);
			$this->db->insert('seg_usuario', $data);
			$report = $this->db->error();
			if($report !== 0){
				return true;
			}else{
				return false;
			}
		}


		/*public function delete_users($id){

			$this->db->where('id', $id);
			$this->db->delete('users');

		}

		public function get_empleados(){

			$this->db->select("");
			$this->db->from("proval.empmae");
			$resultado = $this->db->get();

			return $resultado->result_array();

		}*/


}
?>
