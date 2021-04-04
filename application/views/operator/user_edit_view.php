<section class="content-header">
   <h1>
      Users
      <small>Pengguna</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
      <li class="active">users</li>
   </ol>
</section>

<!-- Main content -->
<section class="content">


   <div class="box">
      <div class="box-header with-border">
         <h3 class="box-title">Edit User</h3>
         <div class="pull-right">
            <a href="<?= site_url('operator') ?>" class="btn btn-warning btn-sm"> <i class="fa fa-undo"></i> Back</a>
         </div>
      </div>


      <div class="box-body">
         <div class="row">
            <div class="col-md-4 col-md-offset-4">
               <?php echo form_open('operator/edit'); ?>
               <div class="form-group">
                  <label for="">Nama Lengkap</label>
                  <input type="hidden" name="id" value="<?php echo $record['operator_id'] ?>">
                  <input type="text" name="nama" value="<?php echo $record['nama_lengkap'] ?>" class="form-control">
               </div>
               <div class="form-group">
                  <label for="">Username</label>
                  <input type="text" name="username" value="<?php echo $record['username'] ?>" class="form-control">
               </div>
               <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="password">
               </div>
               <!-- <div class="form-group">
                     <label for="">address</label>
                     <textarea name="address" class="form-control"><?= $this->input->post('address') ?? $row->address ?></textarea>
                  </div>
                  <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
                     <label for="">Level*</label>
                     <select name="level" class="form-control">
                        <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                        <option value="1"> Admin </option>
                        <option value="2" <?= $level == 2 ? 'selected' : null ?>> Kasir </option>
                     </select>
                     <?= form_error('level') ?>

                  </div> -->
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