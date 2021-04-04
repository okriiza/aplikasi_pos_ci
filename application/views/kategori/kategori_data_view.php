<section class="content-header">
   <h1>
      Kategori
      <small>Data kategori</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
      <li class="active">Kategori</li>
   </ol>
</section>

<!-- Main content -->
<section class="content">
   <div class="box">
      <div class="box-header with-border">
         <h3 class="box-title">Data Kategori</h3>
         <div class="pull-right">
            <a href="<?= site_url('kategori/post') ?>" class="btn btn-primary btn-sm"> <i class="fa fa-user-plus"></i> Create</a>
         </div>
      </div>


      <div class="box-body table-responsive">
         <table class="table table-bordered table-striped" id="table1">
            <thead>
               <tr>
                  <th>No.</th>
                  <th>Nama Kategori</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $no = 1;
               foreach ($record->result() as $r) { ?>
                  <tr>
                     <td style="width: 5%;"><?= $no++ ?>.</td>
                     <td><?php echo $r->nama_kategori ?></td>
                     <td class="text-center" width="160px">
                        <a href="<?= site_url('kategori/edit/' . $r->kategori_id) ?>" class="btn btn-primary btn-xs"> <i class="fa fa-pencil"></i> Update</a>
                        <a href="<?= site_url('kategori/delete/' . $r->kategori_id) ?>" onclick="return confirm('Apakah anda yakin Hapus Kategori Barang ?')" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> Delete</a>
                     </td>
                  </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>
</section>