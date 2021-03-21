<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontrol_model extends CI_Model
{
  public function getAllKontrol()
  {
    $query = "SELECT * FROM  `kontrol`";
    return $this->db->query($query)->result_array();
  }

  public function getAllAcc()
  {
    $query = $this->db->order_by('id', 'DESC')->get('acc', 51);
    return $query->result_array();
  }

  public function getLastLocation()
  {
    $query = "SELECT * FROM `map` ORDER BY `id` DESC";
    return $this->db->query($query)->result_array();
  }

  public function getAllLocation()
  {
    $query = "SELECT * FROM  `map`";
    return $this->db->query($query)->result_array();
  }

  public function countMapData()
  {
    $query = "SELECT COUNT(*) FROM  `map` as total";
    return $this->db->query($query)->result_array();
  }

  function getAllOutputStates($board)
  {
    $query = "SELECT gpio, state FROM kontrol WHERE board='" . $board . "'";
    return $this->db->query($query)->result_array();
  }

  function getAllboards()
  {
    $query = "SELECT board, last_request FROM boards ORDER BY board";
    return $this->db->query($query)->result_array();
  }

  function updateLastBoardTime($board)
  {
    $query = "UPDATE boards SET last_request=now() WHERE board='" . $board .  "'";
    return $this->db->query($query);
  }

  function getBoard($board)
  {
    $query = "SELECT board, last_request FROM boards WHERE board='" . $board . "'";
    return $this->db->query($query)->result_array();
  }

  function updateOutput($id, $state)
  {
    $query = "UPDATE kontrol SET state='" . $state . "' WHERE id='" . $id .  "'";
    return $this->db->query($query);
  }

  function getOutputBoardById($id)
  {
    $sql = "SELECT board FROM Outputs WHERE id='" . $id . "'";
    return $this->db->query($sql)->result_array();
  }
}
