<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontrol_model extends CI_Model
{    
  public function getAllKontrol()
  {
    $query = "SELECT * FROM  `kontrol`";
    return $this->db->query($query)->result_array();
  }

  function getAllOutputStates($board) 
  {
    $query = "SELECT gpio, state FROM kontrol WHERE board='" . $board . "'";
    return $this->db->query($query)->result_array();
  }

  function getAllBoards() 
  {
    $query = "SELECT board, last_request FROM Boards ORDER BY board";
    return $this->db->query($query)->result_array();
  }

  function updateLastBoardTime($board) 
  {
    $query = "UPDATE Boards SET last_request=now() WHERE board='". $board .  "'";
    return $this->db->query($query);
  }

  function getBoard($board)
  {
    $query = "SELECT board, last_request FROM Boards WHERE board='" . $board . "'";
    return $this->db->query($query)->result_array();
  }

  function updateOutput($id, $state) {
    $query = "UPDATE Kontrol SET state='" . $state . "' WHERE id='". $id .  "'";
    return $this->db->query($query);
  }

  function getOutputBoardById($id) 
  {
    $sql = "SELECT board FROM Outputs WHERE id='" . $id . "'";
    return $this->db->query($sql)->result_array();
  }
}
