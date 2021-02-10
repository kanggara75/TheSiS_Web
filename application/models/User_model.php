<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
  public function getAllUser()
  {
    return $this->db->get('user')->result_array();
  }

  function updateUserRole($id, $role)
  {
    $query = "UPDATE user SET role_id='" . $role . "' WHERE id='" . $id .  "'";
    return $this->db->query($query);
  }

  function updateUserStatus($id, $is_active)
  {
    $query = "UPDATE user SET is_active='" . $is_active . "' WHERE id='" . $id .  "'";
    return $this->db->query($query);
  }

  function updateUserEmail($id, $email)
  {
    $query = "UPDATE user SET email='" . $email . "' WHERE id='" . $id .  "'";
    return $this->db->query($query);
  }

  function updateUsername($id, $name)
  {
    $query = "UPDATE user SET name='" . $name . "' WHERE id='" . $id .  "'";
    return $this->db->query($query);
  }
}
