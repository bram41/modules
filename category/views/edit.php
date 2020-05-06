<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <h1 class="h3 mb-4 text-gray-800 ml-3">Edit Kategori</h1>
        <a class="btn btn-primary h3 mb-4 ml-auto mr-3" href="<?= base_url('category'); ?>">Daftar Kategori</a>
    </div>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-sm-10 offset-1">
            <?php foreach ($edit as $p) : ?>
            <form class="user" method="POST" action="<?= base_url('category/edit_kategori'); ?>">
                <div class="form-group">
                    <input type="text" name="id_kategori" class="form-control form-control-user" placeholder="Nama Produk" value="<?= $p['cat_id']; ?>" readonly>
                    <?= form_error('id_kategori', '<small class="text-danger">', '<small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" name="nama_kategori" class="form-control form-control-user" placeholder="Harga Produk" value="<?= $p['cat_name']; ?>">
                    <?= form_error('nama_kategori', '<small class="text-danger">', '<small>'); ?>
                </div>
                    <center>
                    <input class="btn btn-primary btn-user btn-block mt-4 w-50 center" type="submit" name="btnSubmit" value="Edit Kategori" /> 
                    </center>
            </form>
            <? endforeach; ?>
        </div>

    </div>
</div>