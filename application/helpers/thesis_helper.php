<?php

function login_check()
{
  $thesis = get_instance();
  if(!$thesis->session->userdata('email'))
  {
    redirect('auth');
  }
}
