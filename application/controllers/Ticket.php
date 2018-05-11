<?php
class Ticket extends CI_Controller{

	public function __construct(){
		parent::__construct();
		if(!$this->session->logged_in){
			redirect("/login");
		}
		$this->load->model('Ticket_model', 'ticket_model');
	}

	public function index(){
		$data['main_content'] = 'ticket/ticket_grid';
		$data['tickets'] = $this->ticket_model->get_all();
		$this->load->view('template',$data);
	}

	public function form_insert(){

		$data['main_content'] = 'ticket/ticket_insertar';
		$this->load->view('template', $data);

	}


	public function insert()
	{
		//$this->armas_model->insert_armas($_POST);
		//redirect('/armas/', 'refresh');
		if($this->input->server('REQUEST_METHOD') === 'POST'){

			$this->form_validation->set_rules('title', 'Titulo', 'required');
			$this->form_validation->set_rules('descrip', 'Descripcion', 'required');
			$a = $this->input->post();
			$this->form_validation->set_error_delimiters('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');
			if ($this->form_validation->run()){
				if($this->ticket_model->insert_ticket($a) == TRUE){
					$this->session->set_flashdata('flash_message', 'updated');
				}else{
					$this->session->set_flashdata('flash_message', 'not_updated');
				}
				redirect('/ticket/', 'refresh');
			}
		}
		$this->form_insert();
	}

	public function form($id){
		$data['main_content'] = 'ticket/ticket_modificar';
		$data['datos_ticket'] = $this->ticket_model->datos_ticket($id);
		$this->load->view('template', $data);
	}


		public function update(){

			$id = $this->uri->segment(3);
			if($this->input->server('REQUEST_METHOD') === 'POST'){
				$this->form_validation->set_rules('comment', 'de Observacion', 'required');
				$this->form_validation->set_error_delimiters('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>', '</strong></div>');
				if ($this->form_validation->run()){
					$data = $this->input->post();
					$data["id"] = $id;
					if($this->ticket_model->update_ticket($data) == TRUE){
						$this->session->set_flashdata('flash_message', 'updated');
					}else{
						$this->session->set_flashdata('flash_message', 'not_updated');
					}
					redirect('/Ticket/', 'refresh');
				}
			}


			$this->form($id);


		}

		public function report(){
			$post =	$this->input->post();
			$id = $post["id"];
			$data = $this->ticket_model->report_ticket($id);
			echo json_encode($data);
			die;
		}

}
?>
