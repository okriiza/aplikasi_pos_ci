<section class="content-header">
   <h1>
      Kategori
      <small>Add Data kategori</small>
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
         <h3 class="box-title">Add Kategori</h3>
         <div class="pull-right">
            <a href="<?= site_url('kategori') ?>" class="btn btn-warning btn-sm"> <i class="fa fa-undo"></i> Back</a>
         </div>
      </div>


      <div class="box-body">
         <div class="row">
            <div class="col-md-4 col-md-offset-4">
               <?php //echo validation_errors(); 
               ?>
               <?php echo form_open('kategori/post'); ?>
               <div class="form-group">
                  <label>Nama Kategori</label>
                  <input type="text" name="kategori" class="form-control" placeholder="kategori">
               </div>
               <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-success btn-sm"><i class="fa fa-paper-plane"></i> Save</button>
                  <button type="reset" class="btn btn btn-sm"> Reset</button>

               </div>
               </form>
            </div>
         </div>
      </div>
   </div>


</section>