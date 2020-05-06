<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <h1 class="h3 mb-4 text-gray-800 ml-3">Tambah Kategori</h1>
        <a class="btn btn-primary h3 mb-4 ml-auto mr-3" href="<?= base_url('category'); ?>">Daftar Kategori</a>
    </div>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-sm-4 offset-4">
            <form class="user" method="POST" action="<?= base_url('category/tambah_category'); ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="id_kategori" class="form-control form-control-user" placeholder="ID Kategori">
                    <?= form_error('id_kategori', '<small class="text-danger">', '<small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" name="nama_kategori" class="form-control form-control-user" placeholder="Nama Kategori">
                    <?= form_error('nama_kategori', '<small class="text-danger">', '<small>'); ?>
                </div>
                <center>
                    <input class="btn btn-primary btn-user btn-block mt-4 w-50 center" type="submit" name="btnSubmit" value="Tambah Kategori" /> 
                </center>
            </form>
        </div>

    </div>
</div>