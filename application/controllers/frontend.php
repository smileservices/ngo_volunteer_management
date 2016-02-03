<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend extends CI_Controller {

	public function index()
	{
		$this->load->model('proiecte_model');
		$this->load->model('roluri_model');
		$where = 'WHERE activ = 1';
		$data['proiecte'] = $this->proiecte_model->getAll($where);

		$this->load->view('frontend/index-pre-tabs', $data);
	}

	public function test()
	{
		$this->load->model('proiecte_model');
		$this->load->model('roluri_model');
		$where = 'WHERE activ = 1';
		$data['proiecte'] = $this->proiecte_model->getAll($where);

		$this->load->view('frontend/index2', $data);
	}

	public function inscriere()
	{
		$this->load->library('email');
		$this->load->model('voluntari_model');

		if ($this->input->post('email')) {
			if (!$this->voluntari_model->email_exist($this->input->post('email')))  {			
			$voluntar = array(
				'nume' => $this->input->post('nume'),
				'judet' => $this->input->post('judet'),
				'email' => $this->input->post('email'),
				'telefon' => $this->input->post('telefon'),
				'varsta' => $this->input->post('varsta'),
				'expertiza' => $this->input->post('expertiza'),
				'timp' => $this->input->post('timp')
				);
			$voluntar_id = $this->voluntari_model->add($voluntar);
			$rol_id = $this->input->post('rolId');
			$this->voluntari_model->link_rol($rol_id, $voluntar_id);
			
			
			// Trimite mail catre voluntar
			//message
			$message = $this->load->view('templates/inscriere.mail.php', $voluntar, true);
			// configure email settings
		    $config['protocol'] = 'smtp';
		    $config['smtp_host'] = 'mail.romaniacurata.ro';
		    $config['smtp_port'] = '587';
		    $config['smtp_user'] = 'voluntari@romaniacurata.ro'; // email id
		    $config['smtp_pass'] = 'voluntarirc'; // email password
		    $config['mailtype'] = 'html';
		    $config['wordwrap'] = TRUE;
		    $config['charset'] = 'iso-8859-1';
		    $config['newline'] = "\r\n"; //use double quotes here
		    $this->email->initialize($config);

			$this->email->from('voluntari@romaniacurata.ro', 'Voluntari Romania Curata');
			$this->email->to($voluntar['email']);
			$this->email->subject('Inscriere ca voluntar');
			$this->email->message($message);

			if ($this->email->send()) { 
					echo $this->email->print_debugger();
					$mail="Vi s-a trimis un mesaj de instiintare pe adresa de e-mail.";
				} else {
					echo $this->email->print_debugger();
					$mail="Nu veti primi instiintare pe e-amil.";
				}
			$data['response'] = "Inscrierea a fost efectuata cu succes. ".$mail;

			} else $data['response'] = "Adresa de mail exista in baza de date. Contacteaza-ne la voluntari@romaniacurata.ro";
		}

		echo ($data['response']);
	}

}
?>