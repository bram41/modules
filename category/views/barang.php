<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <h1 class="h3 mb-4 text-gray-800 ml-3">Daftar Barang Berdasarkan Kategori</h1>
    </div>
    <!-- DataTales Example -->
    <div class="row">
        <?php foreach ($kategori as $p) : ?>
            <div class="col-4">
                <div class="card-body">
                        <div class="card mb-4 border-left-primary">
                            <div class="card-body">
                                <h4><?= $p['cat_name']; ?></h4>

                                <a href="<?= base_url('category/daftar/'), $p['cat_id']; ?>" class="btn btn-info btn-icon-split float-right">
                                    <span class="text">Lihat Barang</span>
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        <? endforeach; ?>
    </div>

</div>
<!-- /.container-fluid -->