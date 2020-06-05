<section class="page-section bg-primary text-white mb-0 mt-5">
    <div class="container">
        <!-- About Section Heading -->
        <div class="row" id="view">
            <?php $this->load->view('indexSearch', array('product'=>$product)); // Load file view.php dan kirim data siswanya ?>
        </div>
        <div class="row" id="pagination">
            <div class="col-4 offset-4">
                <?= $pagination; ?>
            </div>
        </div>

    </div>
</section>