<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontrol_model extends CI_Model
{
  private $table = 'kontrol';
    
  public function getAllKontrol()
  {
    $query = "SELECT * FROM  . $this->table";
    return $this->db->query($query)->result_array();
  }

  function update_data($where,$data,$table){
    $this->db->bind('id', $data['id']);
    $this->db->bind('state', $data['state']);
		$this->db->where($where);
		$this->db->update($table,$data);
  }	
}
