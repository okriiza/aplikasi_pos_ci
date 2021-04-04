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
         <h3 class="box-title">Data Users</h3>
         <div class="pull-right">
            <a href="<?= site_url('operator/post') ?>" class="btn btn-primary btn-sm"> <i class="fa fa-user-plus"></i> Create</a>
         </div>
      </div>


      <div class="box-body table-responsive">
         <table class="table table-bordered table-striped" id="table1">
            <thead>
               <tr>
                  <th>No.</th>
                  <th>Nama Lengkap</th>
                  <th>Username</th>
                  <th>Login Trakhir</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $no = 1;
               foreach ($record->result() as $key => $r) { ?>
                  <tr>
                     <td style="width: 5%;"><?= $no++ ?>.</td>
                     <td><?php echo $r->nama_lengkap ?></td>
                     <td><?php echo $r->username ?></td>
                     <td><?php echo $r->last_login ?></td>
                     <td class="text-center" width="160px">
                        <a href="<?= site_url('operator/edit/' . $r->operator_id) ?>" class="btn btn-primary btn-xs"> <i class="fa fa-pencil"></i> Update</a>
                        <a href="<?= site_url('operator/delete/' . $r->operator_id) ?>" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> Delete</a>

                        <!-- <a href="<?= site_url('user/edit/') ?>" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> Delete</a> -->
                        <!-- <input type="hidden" name="user_id" value="<?= $r->operator_id ?>"> -->
                        <!-- <button onclick="return confirm('Apakah anda yakin ?')" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> Delete</button> -->
                     </td>
                  </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>


</section>