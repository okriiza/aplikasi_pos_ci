<?php
class Barang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_barang');
        // chek_session();
        check_not_login();
    }


    function index()
    {
        $data['record'] = $this->model_barang->tampil_data();
        $this->template->load('template', 'barang/barang_data_view', $data);
    }

    function post()
    {
        if (isset($_POST['submit'])) {
            // proses barang
            $nama       =   $this->input->post('barang');
            $kategori   =   $this->input->post('kategori');
            $harga      =   $this->input->post('harga');
            $stok      =   $this->input->post('stok');
            $data       = array(
                'nama_barang' => $nama,
                'kategori_id' => $kategori,
                'harga' => $harga,
                'stok_barang' => $stok
            );
            $this->model_barang->post($data);
            redirect('barang');
        } else {
            $this->load->model('model_kategori');
            $data['kategori'] =  $this->model_kategori->tampilkan_data()->result();
            //$this->load->view('barang/form_input',$data);
            $this->template->load('template', 'barang/barang_add_view', $data);
        }
    }


    function edit()
    {
        if (isset($_POST['submit'])) {
            // proses barang
            $id         =   $this->input->post('id');
            $nama       =   $this->input->post('barang');
            $kategori   =   $this->input->post('kategori');
            $harga      =   $this->input->post('harga');
            $stok      =   $this->input->post('stok');
            $data       = array(
                'nama_barang' => $nama,
                'kategori_id' => $kategori,
                'harga' => $harga,
                'stok_barang' => $stok
            );
            $this->model_barang->edit($data, $id);
            redirect('barang');
        } else {
            $id =  $this->uri->segment(3);
            $this->load->model('model_kategori');
            $data['kategori']   =  $this->model_kategori->tampilkan_data()->result();
            $data['record']     =  $this->model_barang->get_one($id)->row_array();
            //$this->load->view('barang/form_edit',$data);
            $this->template->load('template', 'barang/barang_edit_view', $data);
        }
    }


    function delete()
    {
        $id =  $this->uri->segment(3);
        $this->model_barang->delete($id);
        redirect('barang');
    }
}
