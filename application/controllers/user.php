<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

   function __construct()
   {
      parent::__construct();
      check_not_login();
      check_admin();
      $this->load->model('model_user');
      $this->load->library('form_validation');
   }
   public function index()
   {

      $data['row'] = $this->model_user->get();
      $this->template->load('template', 'user/user_data_view', $data);
   }
   public function add()
   {
      $this->form_validation->set_rules('fullname', 'Nama', 'required');
      $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
      $this->form_validation->set_rules(
         'passconf',
         'Konfirmasi Password',
         'required|matches[password]',
         array('matches' => '%s tidak sesuai dengan password')
      );
      $this->form_validation->set_rules('level', 'Level', 'required');
      $this->form_validation->set_message('required', '%s Masih Kosong, Silahkan Isi Terlebih Dahulu');
      $this->form_validation->set_message('min_length', '{field} Minimal 5 Karakter');
      $this->form_validation->set_message('is_unique', '{field} Username Sudah Ada, Ganti Dengan Yang Lain');
      $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

      if ($this->form_validation->run() == FALSE) {

         $this->template->load('template', 'user/user_add_view');
      } else {
         $post = $this->input->post(null, TRUE);
         $this->model_user->add($post);

         if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Di Simpan');</script>";
         }
         echo "<script>window.location='" . site_url('user') . "';</script>";
      }
   }

   public function edit($id)
   {
      $this->form_validation->set_rules('fullname', 'Nama', 'required');
      $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
      if ($this->input->post('password')) {
         $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
         $this->form_validation->set_rules(
            'passconf',
            'Konfirmasi Password',
            'matches[password]',
            array('matches' => '%s tidak sesuai dengan password')
         );
      }
      if ($this->input->post('passconf')) {
         $this->form_validation->set_rules(
            'passconf',
            'Konfirmasi Password',
            'required|matches[password]',
            array('matches' => '%s tidak sesuai dengan password')
         );
      }
      // $this->form_validation->set_rules('address', 'Nama', 'required');
      $this->form_validation->set_rules('level', 'Level', 'required');
      $this->form_validation->set_message('required', '%s Masih Kosong, Silahkan Isi Terlebih Dahulu');
      $this->form_validation->set_message('min_length', '{field} Minimal 5 Karakter');
      $this->form_validation->set_message('is_unique', '{field} Username Sudah Ada, Ganti Dengan Yang Lain');
      $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

      if ($this->form_validation->run() == FALSE) {
         $query = $this->model_user->get($id);
         if ($query->num_rows() > 0) {
            $data['row'] = $query->row();
            $this->template->load('template', 'user/user_edit_view', $data);
         } else {
            echo "<script>alert('Data Tidak Di temukan');";
            echo "window.location='" . site_url('user') . "';</script>";
         }
      } else {
         $post = $this->input->post(null, TRUE);
         $this->model_user->edit($post);

         if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Di Simpan');</script>";
         }
         echo "<script>window.location='" . site_url('user') . "';</script>";
      }
   }

   function username_check()
   {
      $post = $this->input->post(null, TRUE);
      $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id !='$post[user_id]'");
      if ($query->num_rows() > 0) {
         $this->form_validation->set_message('username_check', '{field} ini sudah di pakai, silahkan ganti');
         return FALSE;
      } else {
         return TRUE;
      }
   }

   public function del()
   {
      $id = $this->input->post('user_id');
      $this->model_user->del($id);

      if ($this->db->affected_rows() > 0) {
         echo "<script>alert('Data Berhasil Di Hapus');</script>";
      }
      echo "<script>window.location='" . site_url('user') . "';</script>";
   }
}
