<section class="content-header">
   <h1>
      barang
      <small>Data barang</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
      <li class="active">barang</li>
   </ol>
</section>

<!-- Main content -->
<section class="content">


   <div class="box">
      <div class="box-header with-border">
         <h3 class="box-title">Data barang</h3>
         <div class="pull-right">
            <?php if ($this->fungsi->user_login()->level == 1) { ?>

               <a href="<?= site_url('barang/post') ?>" class="btn btn-primary btn-sm"> <i class="fa fa-user-plus"></i> Create</a>
            <?php }; ?>
         </div>
      </div>


      <div class="box-body table-responsive">
         <table class="table table-bordered table-striped" id="table1">
            <thead>
               <tr>
                  <th>No.</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Harga</th>
                  <th>Stock</th>
                  <?php if ($this->fungsi->user_login()->level == 1) { ?>
                     <th>Aksi</th>
                  <?php }; ?>

               </tr>
            </thead>
            <tbody>
               <?php $no = 1;
               foreach ($record->result() as $r) {

               ?>
                  <tr>
                     <td style="width: 5%;"><?= $no++ ?>.</td>
                     <td><?php echo $r->nama_barang ?></td>
                     <td><?php echo $r->nama_kategori ?></td>
                     <td>Rp. <?php echo number_format($r->harga, 2) ?></td>
                     <td><?php echo $r->stok_barang ?></td>
                     <?php if ($this->fungsi->user_login()->level == 1) { ?>
                        <td class="text-center" width="160px">
                           <a href="<?= site_url('barang/edit/' . $r->barang_id) ?>" class="btn btn-primary btn-xs"> <i class="fa fa-pencil"></i> Update</a>
                           <a href="<?= site_url('barang/delete/' . $r->barang_id) ?>" onclick="return confirm('Apakah anda yakin Hapus Data Barang ?')" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> Delete</a>
                        </td>
                     <?php }; ?>
                  </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>


</section>