<?php

function login_check()
{
  $thesis = get_instance();
  if(!$thesis->session->userdata('email'))
  {
    redirect('auth');
  }else
  {
    $role_id = $thesis->session->userdata('role_id');
    $menu = $thesis->uri->segment(1);

    $queryMenu = $thesis->db->get_where('user_menu', ['menu' => $menu])->row_array();
    $menu_id = $queryMenu['id'];

    $user_access = $thesis->db->get_where('user_access_menu', [
      'role_id' => $role_id, 
      'menu_id' => $menu_id
      ]);

      if($user_access->num_rows() < 1)
      {
        redirect('auth/blocked');
      }
  }
}
