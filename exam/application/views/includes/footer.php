<input type="hidden" name="base_url" value="<?php echo base_url(); ?>">

<script src="<?= base_url("assets/js/jquery.min.js")?>"></script>
<script src="<?= base_url("assets/js/bootstrap.bundle.min.js")?>"></script>
<script src="<?= base_url("assets/js/jquery.dataTables.min.js")?>"></script>

<script src="<?= base_url("assets/plugins/bootstrap/js/bootstrap.bundle.min.js")?>"></script>

<!-- Jquery UI -->
<script src="<?= base_url("assets/plugins/jquery-ui/jquery-ui.min.js")?>"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url("assets/plugins/sweetalert2/sweetalert2.min.js")?>"></script>
<!-- Toastr -->
<script src="<?= base_url("assets/plugins/toastr/toastr.min.js")?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url("assets/dist/js/adminlte.min.js")?>"></script>

<!-- File Upload -->
<script src="<?= base_url("assets/js/fileupload/vendor/jquery.ui.widget.js")?>"></script>
<script src="<?= base_url("assets/js/fileupload/jquery.iframe-transport.js")?>"></script>
<script src="<?= base_url("assets/js/fileupload/jquery.fileupload.js")?>"></script>
<script src="<?= base_url("assets/js/fileupload/jquery.fileupload-process.js")?>"></script>
<script src="<?= base_url("assets/js/fileupload/jquery.fileupload-validate.js")?>"></script>


<script src="<?= base_url("assets/js/custom.js")?>"></script>
<?php
    __load_assets__($__assets__,'js');
?>

</div>
</body>

</html>
