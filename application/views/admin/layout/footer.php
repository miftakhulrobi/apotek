      <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="<?= base_url('admin') ?>/vendors/js/vendor.bundle.base.js"></script>
      <script src="<?= base_url('admin') ?>/vendors/js/vendor.bundle.addons.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page-->
      <!-- End plugin js for this page-->
      <!-- inject:js -->
      <script src="<?= base_url('admin') ?>/js/off-canvas.js"></script>
      <script src="<?= base_url('admin') ?>/js/misc.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page-->
      <!-- End custom js for this page-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script>
            const success = '<?= $this->session->flashdata('success') ?>';
            const error = '<?= $this->session->flashdata('error') ?>';
            if (success) {
                  toastr.success("<?= $this->session->flashdata('success') ?>")
            }
            if (error) {
                  toastr.error("<?= $this->session->flashdata('error') ?>")
            }

            window.setTimeout('waktu()', 1000);

            function waktu() {
                  var waktu = new Date();
                  setTimeout('waktu()', 1000);
                  document.getElementById('jam').innerHTML = waktu.getHours();
                  document.getElementById('menit').innerHTML = waktu.getMinutes();
                  document.getElementById('detik').innerHTML = waktu.getSeconds();
            }
      </script>