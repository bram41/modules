<!-- About Section -->
<section class="page-section bg-primary text-white mb-0 mt-5 " style="min-height:514px;">
    <div class="container">
        <!-- About Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-white mt-5">Daftar Kategori</h2>
        <div class="row">
            <div class="divider-custom divider-light">  
                <?php foreach ($kategori as $p) : ?>
                    <a href="<?= base_url('beranda/daftar/'), $p['cat_id'];; ?>" class="btn btn-success mx-2 btn-lg active" role="button" aria-pressed="true"><?= $p['cat_name']; ?></a>
                <? endforeach; ?>
            </div>
        </div>

    </div>
</section>