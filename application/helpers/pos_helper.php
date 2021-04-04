<?php

// function chek_session()
// {
//    $CI = &get_instance();
//    $session = $CI->session->userdata('status_login');
//    if ($session != 'oke') {
//       redirect('auth/login');
//    }
// }

// function chek_session_login()
// {
//    $CI = &get_instance();
//    $session = $CI->session->userdata('status_login');
//    if ($session == 'oke') {
//       redirect('dashboard');
//    }
// }

function check_already_login()
{
   $ci = &get_instance();
   $user_session = $ci->session->userdata('userid');
   if ($user_session) {
      redirect('dashboard');
   }
}

function check_not_login()
{
   $ci = &get_instance();
   $user_session = $ci->session->userdata('userid');
   if (!$user_session) {
      redirect('auth/login');
   }
}

function check_admin()
{
   $ci = &get_instance();
   $ci->load->library('fungsi');
   if ($ci->fungsi->user_login()->level != 1) {
      redirect('dashboard');
   }
}
