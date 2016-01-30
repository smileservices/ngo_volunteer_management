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
			$message = '
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Confirmare Inscriere</title>
</head>
<body bgcolor="#f6f6f6">
<!-- body -->
<table bgcolor="#f6f6f6">
  <tr>
    <td></td>
    <td bgcolor="#FFFFFF">

      <!-- content -->
      <div>
      <table>
        <tr>
          <td>
            <h4>Buna, '.$voluntar['nume'].'!</h4>
            <p> Va multumim pentru ca ati ales sa va implicati in formarea unei alternative politice! Veti fi contactat(a) in scurta vreme de moderatorul grupului pentru a stabili o intrevedere. Va rugam sa folositi adresa de email vreausieu@romaniacurata.ro pentru a trimite moderatorului dvs orice propunere relevanta pentru tema grupului de lucru, mentionand din care grup de lucru faceti parte.</p>
            <p>O zi frumoasa! </p>   
            <p>Echipa Romania Curata</p>       
            
          </td>
        </tr>
      </table>
      </div>
      <!-- /content -->
        
    </td>
    <td></td>
  </tr>
</table>
<!-- /body -->
</body>
</html>

			';
			// configure email settings
		    $config['protocol'] = 'mail';
		    $config['mailtype'] = 'html';
		    $config['wordwrap'] = TRUE;
		    $config['charset'] = 'iso-8859-1';
		    $config['newline'] = "\r\n";
		    $this->email->initialize($config);

			$this->email->from('vreausieu@romaniacurata.ro', 'Romania Curata Voluntari');
			// $this->email->to('vladimir@dentaltours.co.uk'); 
			$this->email->to($voluntar['email']);
			$this->email->subject('Inscriere ca voluntar');
			$this->email->message($message);
			if ($this->email->send()) { 
					$mail="Vi s-a trimis un mesaj de instiintare pe adresa de e-mail.";
				} else {
					$mail="Nu veti primi instiintare pe e-amil.";
				}
			$data['response'] = "Inscrierea a fost efectuata cu succes. ".$mail;

			} else $data['response'] = "Adresa de mail exista in baza de date. Contacteaza-ne la vreausieu@romaniacurata.ro";
		}

		echo ($data['response']);
	}

}
?>