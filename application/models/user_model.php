<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

 function login($email, $password) {

   $this -> db -> select('pk_user_id, user_email, password');
   $this -> db -> from('users');
   $this -> db -> where('user_email', $email);
   $this -> db -> where('password', $password);
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}

?>