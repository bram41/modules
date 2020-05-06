<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <h1 class="h3 mb-4 text-gray-800 ml-3">Daftar Order</h1>
        <?php if($this->session->flashdata('error') == TRUE): ?>
        <div class="alert alert-danger alert-dismissible fade show ml-5" role="alert">
            <?= $this->session->flashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor Order</th>
                            <th>Tanggal Order</th>
                            <th>Nama Pelanggan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $p) : ?>
                            <tr>
                                <td width="20%"><?= $p['order_num'] ?></td>
                                <td><?= $p['order_date'] ?></td>
                                <td><?= $p['nama'] ?></td>
                                <td>
                                    <?php 
                                        if($p['status'] == 1){
                                            echo "Belum Diambil";
                                        } else if($p['status'] == 2){
                                            echo "Telah Diambil";
                                        } else {
                                            echo "Selesai";
                                        }
                                    ?>
                                </td>
                                <td width="20%">
                                    <center>
                                        <a class="btn btn-success" href="<?= base_url('order/proses/'), $p['order_num'] ?>">Daftar Product</a>
                                    <center>
                                </td>
                            </tr>
                        <? endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->