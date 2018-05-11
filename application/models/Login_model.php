<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct(){
		parent::__construct();

	}

  	function auth_model($user,$password){
			$this->db->select("a.*");
			$this->db->from("users a");
			$this->db->where("a.user_id",$user);
			$this->db->where("a.password", sha1($password));
			$this->db->where("a.sta", 1);
			$this->db->limit(1);
			$query = $this->db->get();
			if($query->num_rows() == 1){
				return $query->result_array()[0];
			}else{
				return false;
			}

			return $query->result();

  	}

	function all_objects(){

		$this->db->select("id, parent_id, label, href, icon");
		$this->db->from("object");
		$this->db->where("parent_id is not null");
		$this->db->where("menu",1);
		$this->db->order_by("order", "asc");
		$this->db->order_by("parent_id", "asc");
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}

		return $query->result();

	}

	function get_object_by_user_rol($rol_id){

		$this->db->select("b.id, b.parent_id, b.label, b.href, b.icon");
		$this->db->from("object_rol a");
		$this->db->join("object b","a.object_id = b.id","inner");
		$this->db->where("a.rol_id",$rol_id);
		$this->db->where("parent_id is not null");
		$this->db->where("b.menu",1);
		$this->db->order_by("order", "asc");
		$this->db->order_by("parent_id", "asc");
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}

		return $query->result();

	}

}
?>
