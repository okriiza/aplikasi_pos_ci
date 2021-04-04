<?php
class auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_operator');
    }

    function login()
    {
        if (isset($_POST['submit'])) {

            // proses login disini
            $username   =   $this->input->post('username');
            $password   =   $this->input->post('password');
            $hasil =  $this->model_operator->login($username, $password);
            if ($hasil == 1) {
                // update last login
                $this->db->where('username', $username);
                $this->db->update('operator', array('last_login' => date('Y-m-d')));
                $this->session->set_userdata(array('status_login' => 'oke', 'username' => $username));
                echo "<script>
            alert('Login Berhasil');
            window.location='" . site_url('dashboard') . "';
            </script>";
                // redirect('dashboard');
            } else {
                echo "<script>
                alert('Username atau password salah !');
                window.location='" . site_url('auth/login') . "';
                </script>";
                // redirect('auth/login');
            }
        } else {
            //$this->load->view('form_login2');
            // chek_session_login();
            $this->load->view('login_view');
        }
    }


    function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
