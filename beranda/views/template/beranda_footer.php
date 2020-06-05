
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin untuk hapus akun?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('account/hapusakun') ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>
  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white ">
    <div class="container">
        <span>Copyright &copy;  E-Commerce <?= date('Y'); ?></span>
    </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <script src="<?= base_url('assets/template_beranda/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/template_beranda/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url('assets/template_beranda/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/template_beranda/'); ?>js/freelancer.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/search.js"></script>

</body>

</html>
