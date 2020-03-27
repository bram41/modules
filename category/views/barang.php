<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <h1 class="h3 mb-4 text-gray-800 ml-3">Daftar Barang Berdasarkan Kategori</h1>
    </div>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-5 offset-3">
            <div class="card-body">
                <?php foreach ($kategori as $p) : ?>
                    <div class="card mb-4 border-left-primary">
                        <div class="card-body">
                            <h4><?= $p['cat_name']; ?></h4>

                            <a href="#" class="btn btn-info btn-icon-split float-right">
                                <span class="text">Lihat Barang</span>
                            </a>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->