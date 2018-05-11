<?php
	class Ticket_model extends CI_Model{
		public function __construct(){
			parent::__construct();
		}
		public function get_all(){
			$this->db->select("*");
			$this->db->from("ticket a");
			$resultado = $this->db->get();
			return $resultado->result_array();
		}


		public function insert_ticket($data){
			$data['created_by']= $this->session->userdata('user_id');
			$this->db->insert('ticket', $data);
			$report = $this->db->error();
			if($report !== 0){
				return true;
			}else{
				return false;
			}
		}

		public function datos_ticket($id){
			$this->db->select('*');
			$this->db->from('ticket');
			$this->db->where('id',$id);
			$result = $this->db->get();
			 $result = $result->result_array();
			return $result[0];
		}
		public function report_ticket($id){
			$this->db->select('comment, updated_date, created_date, descrip, title');
			$this->db->from('ticket');
			$this->db->where('id',$id);
			$result = $this->db->get();
			 $result = $result->result_array();
			return $result[0];
		}

		public function update_ticket($data){
			$data['updated_by']= $this->session->userdata('user_id');
			$this->db->where('id',$data["id"]);
			$this->db->set('sta', 1);
			$this->db->set('updated_by', $data['updated_by']);
			$this->db->set('comment', $data['comment']);
			$this->db->set('updated_date', 'NOW()', FALSE);
			$this->db->update('ticket');
			$report = $this->db->error();
			if($report !== 0){
				return true;
			}else{
				return false;
			}
		}

}
?>
