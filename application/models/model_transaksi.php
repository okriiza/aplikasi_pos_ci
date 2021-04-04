<?php
class model_transaksi extends ci_model
{


    function simpan_barang()
    {
        $nama_barang    =  $this->input->post('barang');
        $qty            =  $this->input->post('qty');
        $idbarang       = $this->db->get_where('barang', array('nama_barang' => $nama_barang))->row_array();
        $data           = array(
            'barang_id' => $idbarang['barang_id'],
            'qty' => $qty,
            'harga' => $idbarang['harga'],
            'status' => '0'
        );
        $this->db->insert('transaksi_detail', $data);
        $qty =  $this->db->query("SELECT qty from transaksi_detail order by t_detail_id desc")->row_array();
        $id_barang =  $this->db->query("SELECT barang_id from transaksi_detail ORDER BY t_detail_id DESC")->row_array();
        $this->db->query("UPDATE barang SET  stok_barang=stok_barang-'" . $qty['qty'] . "' WHERE barang_id='" . $id_barang['barang_id'] . "'");
    }

    function tampilkan_detail_transaksi()
    {
        $query  = "SELECT td.t_detail_id,td.qty,td.harga,b.nama_barang
                FROM transaksi_detail as td,barang as b
                WHERE b.barang_id=td.barang_id and td.status='0'";
        return $this->db->query($query);
    }

    function hapusitem($id)
    {
        $qty =  $this->db->query("SELECT qty from transaksi_detail order by t_detail_id='$id' desc")->row_array();

        $id_barang =  $this->db->query("SELECT barang_id from transaksi_detail ORDER BY t_detail_id='$id' DESC")->row_array();
        $this->db->query("UPDATE barang SET  stok_barang=stok_barang+'" . $qty['qty'] . "' WHERE barang_id='" . $id_barang['barang_id'] . "'");

        $this->db->where('t_detail_id', $id);
        $this->db->delete('transaksi_detail');
    }


    function selesai_belanja($data)
    {
        $this->db->insert('transaksi', $data);
        $last_id =  $this->db->query("SELECT transaksi_id from transaksi order by transaksi_id desc")->row_array();
        $this->db->query("UPDATE transaksi_detail set transaksi_id='" . $last_id['transaksi_id'] . "' where status='0'");
        $this->db->query("UPDATE transaksi_detail set status='1' where status='0'");
    }


    function laporan_default()
    {
        $query = "SELECT t.tanggal_transaksi,o.name,sum(td.harga*td.qty) as total
                FROM transaksi as t,transaksi_detail as td,user as o
                WHERE td.transaksi_id=t.transaksi_id and o.user_id=t.user_id
                group by t.transaksi_id";
        return $this->db->query($query);
    }

    function laporan_periode($tanggal1, $tanggal2)
    {
        $query = "SELECT t.tanggal_transaksi,o.name,sum(td.harga*td.qty) as total
                FROM transaksi as t,transaksi_detail as td,user as o
                WHERE td.transaksi_id=t.transaksi_id and o.user_id=t.user_id 
                and t.tanggal_transaksi between '$tanggal1' and '$tanggal2'
                group by t.transaksi_id";
        return $this->db->query($query);
    }
    function get_count()
    {
        $sql = "SELECT count(transaksi_id) as transaksi_id FORM transaksi";
        $result = $this->db->query($sql);
        return $result->row()->transaksi_id;
    }
}
