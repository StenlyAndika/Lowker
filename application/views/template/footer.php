    <div class="modal fade" id="modaldaftar" tabindex="-1" role="dialog" >
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
                <h3>Registrasi Pemilik Perusahaan</h3>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="" action="<?= base_url() ?>auth/daftar" method="post">
            <div class="modal-body">
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="E-mail" style="margin-bottom: 10px" required>
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" style="margin-bottom: 10px" required>
                <input type="text" name="telp" class="form-control" placeholder="08xxxxxxxxxx" style="margin-bottom: 10px" required>
                <input type="password" name="pass" class="form-control" placeholder="Password" style="margin-bottom: 10px" required>
                <input type="password" name="password" class="form-control" placeholder="Ulangi Password" style="margin-bottom: 10px" required>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Daftar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modallogin" tabindex="-1" role="dialog" >
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">
                <h3>Login</h3>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="" action="<?= base_url() ?>auth/login" method="post">
            <div class="modal-body">
              <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="E-mail" style="margin-bottom: 10px" required>
                <input type="password" name="password" class="form-control" placeholder="Password" style="margin-bottom: 10px" required>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Masuk</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    </main>
    <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="container">
        <div class="copyright">
          <strong>Copyright © 2022 <a href="https://www.sungaipenuhkota.go.id/">Pemerintah Kota Sungai Penuh</a>.</strong> All rights reserved.
        </div>
      </div>
    </footer><!-- End Footer -->
	</body>

	<!-- Jquery -->
    <script src="<?= base_url() ?>/lib/jQuery-3.3.1/jquery-3.3.1.min.js"></script>
    
    <!-- Bootstrap JS-->
    <script src="<?= base_url() ?>/lib/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- Datatables JS -->
    <script src="<?= base_url() ?>/lib/datatables/datatables.js" type="text/javascript"></script>

    <!-- DatePicker JS -->
    <script src="<?= base_url() ?>/lib/datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>

    <!-- FontAwesome Icon -->
    <script src="https://kit.fontawesome.com/d6482bd15d.js" crossorigin="anonymous"></script>

    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <!-- Vendor JS Files -->
    <script src="<?= base_url() ?>lib/sailor/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url() ?>lib/sailor/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>lib/sailor/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url() ?>lib/sailor/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="<?= base_url() ?>lib/sailor/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>lib/sailor/js/main.js"></script>

	<script>
		$(document).ready(function(){
      
      // $("#modaldetail").modal('hide');

      $(".detaillowongan").click(function(e) {
        var m = $(this).attr("data-id");
        $.ajax({
          url: "<?= base_url() ?>lowongan/detail",
          type: "POST",
          data : {idl: m},
          success: function (ajaxData){
            $("#modaldetail").html(ajaxData);
            $("#modaldetail").modal('show',{backdrop: 'true'});
          }
        });
      });

		});
	</script>
</html>