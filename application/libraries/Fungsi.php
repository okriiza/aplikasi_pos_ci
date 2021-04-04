<?php

class Fungsi
{
   protected $ci;

   function __construct()
   {
      $this->ci = &get_instance();
   }

   // function user_login()
   // {
   //    $this->ci->load->model('model_operator');
   //    $user_id = $this->ci->session->userdata('operatorid');
   //    $user_data = $this->ci->user_model->get($user_id)->row();
   //    return $user_data;
   // }
   function user_login()
   {
      $this->ci->load->model('model_user');
      $user_id = $this->ci->session->userdata('userid');
      $user_data = $this->ci->model_user->get($user_id)->row();
      return $user_data;
   }
}
