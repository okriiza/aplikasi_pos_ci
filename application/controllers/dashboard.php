<?php
class Dashboard extends CI_Controller
{


    function index()
    {
        // chek_session();
        check_not_login();
        $this->template->load('template', 'v_dashboard');
    }
}
