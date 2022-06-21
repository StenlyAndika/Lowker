    

    <footer class="text-muted">
        <div class="text-md-left">
            <strong>Copyright © 2022 <a href="http://jogjakota.go.id">Pemerintah Kota Sungai Penuh</a>.</strong> All rights reserved.
        </div>
    </footer>

    </div>

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

    <!-- CKEditor -->
    <script src="<?= base_url() ?>/lib/ckeditor/ckeditor.js" type="text/javascript"></script>

	<script type="text/javascript">

        CKEDITOR.replace('persyaratan');
        CKEDITOR.replace('uraiansingkat');
        CKEDITOR.replace('uraiantugas');
        CKEDITOR.replace('alamat');

		let toggle = document.querySelector('.toggle');
		let navigation = document.querySelector('.navigation');
		let menu = document.querySelector('.menu-bar');
		let menutitle = document.querySelector('.menu-title');
		let main = document.querySelector('.main-content');
		let userimg = document.querySelector('.userimg');

		toggle.onclick = function() {
			navigation.classList.toggle('active');
			userimg.classList.toggle('active');
			menu.classList.toggle('active');
			menutitle.classList.toggle('active');
			main.classList.toggle('active');
		}	

		let list = document.querySelectorAll('.navigation li');
		function hoverlink() {
			list.forEach((item) =>
			item.classList.remove('hovered'));
			this.classList.add('hovered');
		}
		list.forEach((item) =>
		item.addEventListener('mouseover',hoverlink));

        $(document).ready(function() {
            $('#datatable').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': false,
                'autoWidth': true,
                "language":{
                    "url":"https://cdn.datatables.net/plug-ins/1.11.5/i18n/id.json",
                    "sEmptyTable":"Tidads"
                }
            });
        });
    
        $(function(){
            $("#tgl").datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                todayHighlight: true,
                language : 'id'
            });
        });

        var selectmultiple = $("#jmss").select2({
            placeholder: "Pilih",
            tags: true
        });

        $(".veriflowongan").click(function(e) {
            var dataId = $(this).data('id');
            var dataKet = $(this).data('ket');
            $("#idl").val(dataId);
            $("#ket").val(dataKet);
            $("#veriflowongan").modal('show',{backdrop: 'true'})
        });

        $(".tolaklowongan").click(function(e) {
            var dataId = $(this).data('id');
            var dataKet = $(this).data('ket');
            $("#tolakidl").val(dataId);
            $("#tolakket").val(dataKet);
            $("#tolaklowongan").modal('show',{backdrop: 'true'})
        });

        $(".verifperusahaan").click(function(e) {
            var dataId = $(this).data('id');
            var dataKet = $(this).data('ket');
            $("#idp").val(dataId);
            $("#ket").val(dataKet);
            $("#verifperusahaan").modal('show',{backdrop: 'true'})
        });

        $(".tolakperusahaan").click(function(e) {
            var dataId = $(this).data('id');
            var dataKet = $(this).data('ket');
            $("#tolakidp").val(dataId);
            $("#tolakket").val(dataKet);
            $("#tolakperusahaan").modal('show',{backdrop: 'true'})
        });
    </script>

</body>

</html>
<!-- end document -->
<?php 
    ob_flush();
?>