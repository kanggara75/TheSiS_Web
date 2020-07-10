<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span class=”copy-left”>Copyright &copy; KAnggara75 <?= date('F Y')?></span>
		</div>
	</div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?= base_url('auth/logout');?>">Logout</a>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

<?php if($title == "Admin Page"): ?>
<!-- Memanggil Script hanya pada Admin Page dan User Page -->
<!-- <script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script> -->
<!-- <script src="<?= base_url('assets/') ?>js/demo/chart-area-demo.js"></script> -->
<script>
	$(document).ready(function() {
		setInterval(function () {
			$("#switch").load("<?= base_url('admin/getAllKontrol'); ?>");
		}, 10000);
	});

	$('.switch-input').on('click', function () {
		const id = $(this).data('id');
		const state = $(this).data('state');
		const nama = $(this).data('nama');
		$.ajax({
			url: "<?= base_url('admin/updateKontrol'); ?>",
			type: 'post',
			data: {
				id: id,
				nama: nama,
				state: state
			},
			success: function () {
				document.location.href = "<?= base_url('admin'); ?>";
			}
		})
	});

</script>
<?php elseif($title == "Edit Profile"): ?>
<!-- AJAX Edit Profile  -->
<script>
	$('.custom-file-input').on('change', function () {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});

</script>
<?php elseif($title == "Role Access Page"): ?>
<!-- AJAX change Access -->
<script>
	$('.form-check-input').on('click', function () {
		const menuId = $(this).data('menu');
		const roleId = $(this).data('role');
		$.ajax({
			url: "<?= base_url('admin/changeaccess'); ?>",
			type: 'post',
			data: {
				menuId: menuId,
				roleId: roleId
			},
			success: function () {
				document.location.href = "<?= base_url('admin/roleAccess/'); ?>" + roleId;
			}
		})
	});

</script>
<?php endif; ?>
</body>

</html>
