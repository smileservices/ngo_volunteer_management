<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voluntari_model extends CI_Model {

	var $table = 'voluntari';
	var $pk    = 'pk_voluntar_id';

	var $table_match = 'roluri_voluntari';
	var $pk_match    = 'pk_match_id';
	
	function __construct(){
		parent::__construct();
	}
	
	function getAll($where = '', $table = 'voluntari'){
		$sql = "SELECT * FROM $table $where";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0 ) {
			return $res->result();
		}
	}
	
	function get($id){
		$return = $this->getAll(" WHERE $this->pk = $id");
		if (is_array($return) && sizeof($return) > 0 ) return $return[0];
	}
	
	function count($extra, $table = 'voluntari'){
		$sql = "SELECT count(*) as cnt FROM $table $extra";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0) {
			$row = $res->row();
			return $row->cnt;
		}
		return 0;
	}
	
	function delete($id){
		$sql = "DELETE FROM $this->table WHERE $this->pk = $id";
		$this->db->query($sql);
	}
	
	function update($id,$arr, $table = 'voluntari'){
		$this->db->where($this->pk, $id);
		$this->db->update($table, $arr); 
	}
	
	function add($arr){
		$this->db->insert($this->table,$arr);
		return $this->db->insert_id();
	}
	
	//custom functions

	function voluntari_fara_rol () {
		$sql = "SELECT * FROM voluntari
					LEFT JOIN roluri_voluntari ON voluntari.pk_voluntar_id = roluri_voluntari.fk_voluntar_id
					WHERE roluri_voluntari.fk_voluntar_id IS NULL";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0 ) {
			return $res->result();
		}
	}

	function email_exist($email, $extra = ''){
		$users = $this->getAll(" WHERE email = '$email' $extra");
		if (is_array($users) && sizeof($users) > 0 ) return true;
		return false;
	}

	function link_rol ($rol_id, $voluntar_id, $validat = 'NULL') {
		$match = array(
			'fk_rol_id' => $rol_id,
			'fk_voluntar_id'=> $voluntar_id,
			'validat' => $validat );
		$this->db->insert($this->table_match, $match);
	}

	function numara_voluntari ($rol_id) {
		$where = "WHERE fk_rol_id = $rol_id";
		return $this->count($where, $this->table_match);
	}

	function get_everything ($where = '') {
		$sql = "SELECT * FROM voluntari AS v
			JOIN roluri_voluntari AS m ON v.pk_voluntar_id = m.fk_voluntar_id
			JOIN roluri AS r ON m.fk_rol_id = r.pk_rol_id
			JOIN proiecte AS p ON r.fk_proiect_id = p.pk_proiect_id $where";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0 ) {
			return $res->result();
		}
	}

	function delete_match($id, $case = 'voluntar'){
		switch ($case) {
			case 'rol':
				$sql = "DELETE FROM $this->table_match WHERE fk_rol_id = $id";
				break;
			case 'match':
				$sql = "DELETE FROM $this->table_match WHERE pk_match_id = $id";
				break;				
			case 'voluntar':
				$sql = "DELETE FROM $this->table_match WHERE fk_voluntar_id = $id";
				break;			
			}	
		$this->db->query($sql);		
	}

	function update_match($id,$arr){
		$this->db->where($this->pk_match, $id);
		$this->db->update($this->table_match, $arr); 
	}
}
?>