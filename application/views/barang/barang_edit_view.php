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
         <h3 class="box-title">Edit barang</h3>
         <div class="pull-right">
            <a href="<?= site_url('barang') ?>" class="btn btn-warning btn-sm"> <i class="fa fa-undo"></i> Back</a>
         </div>
      </div>


      <div class="box-body">
         <div class="row">
            <div class="col-md-4 col-md-offset-4">
               <?php echo form_open('barang/edit'); ?>
               <div class="form-group">
                  <label for="">Nama Lengkap</label>
                  <input type="hidden" name="id" value="<?php echo $record['barang_id'] ?>">
                  <input type="text" name="barang" placeholder="barang" value="<?php echo $record['nama_barang'] ?>" class="form-control">
               </div>
               <div class="form-group">
                  <label>Kategori</label>
                  <select name="kategori" class="form-control">
                     <?php foreach ($kategori as $k) {
                        echo "<option value='$k->kategori_id'";
                        echo $record['kategori_id'] == $k->kategori_id ? 'selected' : '';
                        echo ">$k->nama_kategori</option>";
                     } ?>
                  </select>
               </div>
               <div class="form-group">
                  <label>Harga</label>
                  <input class="form-control" name="harga" value="<?php echo $record['harga'] ?>">
               </div>
               <div class="form-group">
                  <label>Stok</label>
                  <input class="form-control" name="stok" value="<?php echo $record['stok_barang'] ?>">
               </div>
               <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-success btn-sm"><i class="fa fa-paper-plane"></i> Update</button>
                  <button type="reset" class="btn btn btn-sm"> Reset</button>
               </div>
               </form>
            </div>
         </div>
      </div>
   </div>


</section>