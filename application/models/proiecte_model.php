<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proiecte_model extends CI_Model {

	var $table = 'proiecte';
	var $pk    = 'pk_proiect_id';
	
	function __construct(){
		parent::__construct();
	}
	
	function getAll($where = ''){
		$sql = "SELECT * FROM $this->table $where";
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0 ) {
			return $res->result();
		}
	}
	
	function get($id){
		$return = $this->getAll(" WHERE $this->pk = $id");
		if (is_array($return) && sizeof($return) > 0 ) return $return[0];
	}
	
	function count($extra){
		$sql = "SELECT count(*) as cnt FROM $this->table $extra";
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
	
	function update($id,$arr){
		$this->db->where($this->pk, $id);
		$this->db->update($this->table, $arr); 
	}
	
	function add($arr){
		$this->db->insert($this->table,$arr);
	}

	//custom functions

}
?>