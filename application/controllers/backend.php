<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()	{
		if($this->session->userdata('logged_in'))  {
		    $session_data = $this->session->userdata('logged_in');
		    $data['user_email'] = $session_data['user_email'];

			$this->load->model('proiecte_model');
			$this->load->model('roluri_model');
			$this->load->model('voluntari_model');

			$data['proiecte'] = $this->proiecte_model->getAll();
			$data['voluntari'] = $this->voluntari_model->get_everything();
			$data['voluntari_fara_rol'] = $this->voluntari_model->voluntari_fara_rol();

			$data['all_roluri'] = $this->roluri_model->getAllProiecteActive();

			$this->load->view('backend/index', $data);
		}
	   else  {
	     //If no session, redirect to login page
	     redirect('login', 'refresh');  }
	}

	 public function logout() {
	   $this->session->unset_userdata('logged_in');
	   redirect('frontend', 'refresh');
	 }

	public function edit_rol()	{
		$this->load->model('roluri_model');
		$this->load->model('voluntari_model');

		if ($this->input->post('submit') == 'edit') {
			$edits = array(
				'rol_nume' => $this->input->post('rolNume'),
				'sarcini' => $this->input->post('rolSarcini'),
				'timp' => $this->input->post('rolTimp'));
			$this->roluri_model->update($this->input->post('rolId'), $edits);
		} elseif ($this->input->post('submit') == 'delete') {
			$this->roluri_model->delete($this->input->post('rolId'));
			$this->voluntari_model->delete_match($this->input->post('rolId'), 'rol');
		}

		redirect(base_url().'backend/index');
	}

		public function create_rol() {
		$this->load->model('roluri_model');

		if ($this->input->post('submit')) {
			$rol = array(
				'rol_nume' => $this->input->post('rolNume'),
				'sarcini' => $this->input->post('rolSarcini'),
				'timp' => $this->input->post('rolTimp'),
				'fk_proiect_id' => $this->input->post('proiectId'));
			$this->roluri_model->add($rol);
		}

		redirect(base_url().'backend/index');
	}

		public function edit_proiect() {
		$this->load->model('proiecte_model');

		if ($this->input->post('submit') == 'edit') {
			$edits = array(
				'proiect_nume' => $this->input->post('proiectNume'),
				'descriere' => $this->input->post('proiectDescriere'),
				'activ' => $this->input->post('proiectActiv'));
			$this->proiecte_model->update($this->input->post('proiectId'), $edits);
		} elseif ($this->input->post('submit') == 'delete') {
			$this->proiecte_model->delete($this->input->post('proiectId'));
			//delete photo
			$proiectPic = './upload/img/'.$this->input->post('proiectPic');
				//delete  db pic
			unlink($proiectPic);
		}

		redirect(base_url().'backend/index');
	}

	public function new_proiect() {
		$this->load->model('proiecte_model');

		if ($this->input->post('submit') == 'new') {
			
			$config['upload_path'] = 'upload/img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '200';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('pic'))
			{
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
			}
			else
			{
				$data = $this->upload->data();
				$ext  = array_pop(explode(".",$data['file_name']));	
	            $file_name = substr(time(),4).rand(44,999);					
	            rename($config['upload_path'] . $data['file_name'], $config['upload_path'] . $file_name.'.'.$ext);			

				$proiect = array(
				'proiect_nume' => $this->input->post('proiectNume'),
				'descriere' => $this->input->post('proiectDescriere'),
				'pic' => $file_name.'.'.$ext,
				'activ' => $this->input->post('proiectActiv'));

				$this->proiecte_model->add($proiect);

				redirect(base_url().'backend/index');
			}
		}		
	}

		public function edit_pic() {
			$this->load->model('proiecte_model');

			$config['upload_path'] = 'upload/img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '200';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('pic'))
			{
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
			}
			else
			{
				$data = $this->upload->data();
				$ext  = array_pop(explode(".",$data['file_name']));	
	            $file_name = substr(time(),4).rand(44,999);					
	            rename($config['upload_path'] . $data['file_name'],$config['upload_path'] . $file_name.'.'.$ext);			

				$update = array ('pic' => $file_name.'.'.$ext);
				$proiectId = $this->input->post('proiectId');
				$proiectFormerPic = './upload/img/'.$this->input->post('proiectPic');
				//delete former db pic
				unlink($proiectFormerPic);
				//update db pic
				$this->proiecte_model->update($proiectId, $update);

				redirect(base_url().'backend/index');
			}
		}

	public function voluntari()
	{
		$this->load->model('proiecte_model');
		$this->load->model('roluri_model');
		$this->load->model('voluntari_model');

		$proiectId = $this->uri->segment(3);

		//get proiect
		$data['proiect']=$this->proiecte_model->get($proiectId);	
		//get roluri
		$where = "WHERE fk_proiect_id = $proiectId";
		$data['roluri'] = $this->roluri_model->getAll($where);

		$this->load->view('backend/voluntari', $data);
	}

	public function update_voluntari()
	{
		$this->load->model('voluntari_model');

		//edit volutnar
		if ($this->input->post('submit') == 'edit') {
			$voluntar = array(
				'nume' => $this->input->post('voluntarNume'),
				'judet' => $this->input->post('voluntarJudet'),
				'email' => $this->input->post('voluntarEmail'),
				'telefon' => $this->input->post('voluntarTelefon'),
				'varsta' => $this->input->post('voluntarVarsta'),
				'expertiza' => $this->input->post('voluntarExpertiza'),
				'timp' => $this->input->post('voluntarTimp')
				);
			$this->voluntari_model->update($this->input->post('voluntarId'),$voluntar);
			
		} elseif ($this->input->post('submit') == 'delete') {
			$this->voluntari_model->delete($this->input->post('voluntarId'));
			$this->voluntari_model->delete_match($this->input->post('voluntarId'), 'voluntar');
		}
	
		redirect(base_url().'backend/index');
	}

	public function update_match()
	{ 
		$this->load->model('voluntari_model');
		if ($this->input->post('submit') == 'edit') {
			$edit = array (
				'fk_rol_id' => $this->input->post('match_rol_id'),
				'validat' => $this->input->post('validat') );
			$this->voluntari_model->update_match($this->input->post('match-id'), $edit);
			redirect(base_url().'backend/index');

		} else if ($this->input->post('submit') == 'delete') {
			$this->voluntari_model->delete_match($this->input->post('match_rol_id'), 'rol');
			redirect(base_url().'backend/index');
		}
	}

	public function assign_match () {
		$this->load->model('voluntari_model');
		if ($this->input->post('submit') == 'assign') {
			$rol_id = $this->input->post('rol_id');
			$voluntar_id = $this->input->post('voluntar_id');
			$validat = $this->input->post('validat');

			//echo $rol_id."<br>".$voluntar_id."<br>".$validat;

			$this->voluntari_model->link_rol($rol_id, $voluntar_id, $validat);

			redirect(base_url().'backend/index');
		}

	}


}
?>