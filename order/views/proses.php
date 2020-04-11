<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <h1 class="h3 mb-4 text-gray-800 ml-3">Daftar Product Order Nomor <?= $nomor ?></h1>
        <?php if($this->session->flashdata('error') == TRUE): ?>
        <div class="alert alert-danger alert-dismissible fade show ml-5" role="alert">
            <?= $this->session->flashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
        <?php 
        if ($status == 1 ) { ?>
            <a class="btn btn-primary h3 mb-4 ml-auto mr-3" href="<?= base_url('order/proses_order/1'); ?>">Telah Diambil</a>
        <? } else if ($status == 2) { ?>
            <a class="btn btn-primary h3 mb-4 ml-auto mr-3" href="<?= base_url('order/proses_order/2'); ?>">Telah Dikembalikan</a>
        <? } else { ?>
            <span class="btn btn-primary h3 mb-4 ml-auto mr-3">Selesai</span>
        <? } ?>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Product</th>
                            <th>Kategori</th>
                            <th>Biaya Sewa</th>
                            <th>Durasi Sewa</th>
                            <th>Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $p) : ?>
                            <tr>
                                <td><?= $p['prod_name'] ?></td>
                                <td><?= $p['cat_name'] ?></td>
                                <td>Rp. <?= number_format($p['prod_price'],0,",",".");?></td>
                                <td><?= $p['quantity'] ?></td>
                                <td>Rp. <?php $hasil = $p['quantity'] * $p['prod_price']; echo number_format($hasil,0,",",".");?> </td>
                            </tr>
                        <? endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->