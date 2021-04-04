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
         <h3 class="box-title">Edit kategori</h3>
         <div class="pull-right">
            <a href="<?= site_url('kategori') ?>" class="btn btn-warning btn-sm"> <i class="fa fa-undo"></i> Back</a>
         </div>
      </div>


      <div class="box-body">
         <div class="row">
            <div class="col-md-4 col-md-offset-4">
               <?php echo form_open('kategori/edit'); ?>
               <div class="form-group">
                  <label for="">Nama Lengkap</label>
                  <input type="hidden" name="id" value="<?php echo $record['kategori_id'] ?>">
                  <input type="text" name="kategori" placeholder="kategori" value="<?php echo $record['nama_kategori'] ?>" class="form-control">
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