<section class="content-header">
    <h1>
        Transaksi
        <small>Transaksi Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Transaksi</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <!-- <div class="box-header with-border">
            <h3 class="box-title">Transaksi</h3>
            <div class="pull-right">
                <a href="<?= site_url('kategori/add') ?>" class="btn btn-primary btn-sm"> <i class="fa fa-plus"></i> Create</a>
            </div>
        </div> -->


        <div class="panel-body">
            <?php echo form_open('transaksi', array('class' => 'form-horizontal')); ?>
            <div class="form-group">
                <label class="col-sm-2 control-label">Nama Barang</label>
                <div class="col-sm-10">
                    <input list="barang" name="barang" placeholder="masukan nama barang" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Quantity</label>
                <div class="col-sm-10">
                    <input type="number" name="qty" placeholder="QTY" class="form-control">
                </div>

            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | <?php echo anchor('transaksi/selesai_belanja', 'Selesai', array('class' => 'btn btn-success btn-sm')) ?>
                </div>
            </div>
            </form>

            <datalist id="barang">
                <?php foreach ($barang->result() as $b) {
                    echo "<option value='$b->nama_barang'>";
                } ?>
            </datalist>
        </div>


        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    $total = 0;
                    foreach ($detail as $r) { ?>
                        <tr class="gradeU">
                            <td><?php echo $no ?></td>
                            <td><?php echo $r->nama_barang . ' - ' . anchor('transaksi/hapusitem/' . $r->t_detail_id, 'Hapus', array('style' => 'color:red;')) ?></td>
                            <td><?php echo $r->qty ?></td>
                            <td>Rp. <?php echo number_format($r->harga, 2) ?></td>
                            <td>Rp. <?php echo number_format($r->qty * $r->harga, 2) ?></td>
                        </tr>
                    <?php $total = $total + ($r->qty * $r->harga);
                        $no++;
                    } ?>
                    <tr class="gradeA">
                        <td colspan="4">T O T A L</td>
                        <td>Rp. <?php echo number_format($total, 2); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>


</section>