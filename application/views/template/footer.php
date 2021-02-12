<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span class=”copy-left”>Copyright &copy; KAnggara75 <?= date('F Y') ?></span>
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
				<a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

<?php if ($title == "Admin Page") : ?>
	<!-- Memanggil Script hanya pada Admin Page dan User Page -->
	<script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>
	<!-- My Css For Map Table-->
	<link href="<?= base_url('assets/') ?>css/logMap.css" rel="stylesheet">
	<!-- Chart Script -->
	<script>
		function number_format(number, decimals, dec_point, thousands_sep) {
			number = (number + '').replace(',', '').replace(' ', '');
			var n = !isFinite(+number) ? 0 : +number,
				prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
				sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
				dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
				s = '',
				toFixedFix = function(n, prec) {
					var k = Math.pow(10, prec);
					return '' + Math.round(n * k) / k;
				};
			// Fix for IE parseFloat(0.55).toFixed(0) = 0;
			s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
			if (s[0].length > 3) {
				s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
			}
			if ((s[1] || '').length < prec) {
				s[1] = s[1] || '';
				s[1] += new Array(prec - s[1].length + 1).join('0');
			}
			return s.join(dec);
		}

		var ctx = document.getElementById("myAreaChart");
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: [
					<?php foreach ($chart as $t) : ?>
						<?= '"' . date('i:s', $t['time']) . '",'; ?>
					<?php endforeach; ?>
				],
				datasets: [{
						label: 'X',
						lineTension: 0.25,
						pointRadius: 2,
						pointBackgroundColor: "rgba(239,50,90,1)",
						pointBorderColor: "rgba(239,50,90,1)",
						pointHoverRadius: 4,
						pointHoverBackgroundColor: "rgba(255,50,90,1)",
						pointHoverBorderColor: "rgba(255,50,90,1)",
						pointHitRadius: 10,
						pointBorderWidth: 2,
						backgroundColor: 'rgba(239,71,111,0.05)',
						borderColor: 'rgba(239,71,111,1)',
						borderWidth: 2,
						data: [
							<?php foreach ($chart as $t) : ?>
								<?= '"' . $t['x'] . '",'; ?>
							<?php endforeach; ?>
						],
					},
					{
						label: 'Y',
						lineTension: 0.25,
						backgroundColor: "rgba(255,209,102,0.05)",
						borderColor: "rgba(255,209,102,0.8)",
						pointRadius: 2,
						pointBackgroundColor: "rgba(255,200,150,1)",
						pointBorderColor: "rgba(255,200,150,1)",
						pointHoverRadius: 4,
						pointHoverBackgroundColor: "rgba(255,200,100,1)",
						pointHoverBorderColor: "rgba(255,200,100,1)",
						pointHitRadius: 10,
						pointBorderWidth: 2,
						borderWidth: 2,
						data: [
							<?php foreach ($chart as $t) : ?>
								<?= '"' . $t['y'] . '",'; ?>
							<?php endforeach; ?>
						],
					},
					{
						label: 'Z',
						lineTension: 0.25,
						backgroundColor: "rgba(6,214,160,0.05)",
						borderColor: "rgba(6,214,160,0.8)",
						pointRadius: 2,
						pointBackgroundColor: "rgba(6,200,100,1)",
						pointBorderColor: "rgba(6,200,120, 1)",
						pointHoverRadius: 4,
						pointHoverBackgroundColor: "rgba(0,200,50,1)",
						pointHoverBorderColor: "rgba(0,200,50,1)",
						pointHitRadius: 10,
						pointBorderWidth: 2,
						borderWidth: 2,
						data: [
							<?php foreach ($chart as $t) : ?>
								<?= '"' . $t['z'] . '",'; ?>
							<?php endforeach; ?>
						],
					},
				]
			},
			options: {
				maintainAspectRatio: false,
				layout: {
					padding: {
						left: 5,
						right: 5,
						top: 5,
						bottom: 0
					}
				},
				scales: {
					xAxes: [{
						time: {
							unit: 'date'
						},
						gridLines: {
							color: "rgb(234, 236, 244)",
							zeroLineColor: "rgb(0,0,0)",
							drawBorder: true,
							// borderDash: [2],
							// zeroLineBorderDash: [2]
						},
						ticks: {
							maxTicksLimit: 40
						}
					}],
					yAxes: [{
						ticks: {
							maxTicksLimit: 15,
							padding: 10,
						},
						gridLines: {
							color: "rgb(234, 236, 244)",
							zeroLineColor: "rgb(0,0,0)",
							drawBorder: true,
							borderDash: [1],
							// zeroLineBorderDash: [2]
						}
					}],
				},
				legend: {
					display: false
				},
				tooltips: {
					backgroundColor: "rgb(255,255,255)",
					bodyFontColor: "#858796",
					titleMarginBottom: 10,
					titleFontColor: '#6e707e',
					titleFontSize: 14,
					borderColor: '#dddfeb',
					borderWidth: 1,
					xPadding: 5,
					yPadding: 5,
					displayColors: true,
					intersect: false,
					mode: 'index',
					caretPadding: 10,
					callbacks: {
						label: function(tooltipItem, chart) {
							var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
							return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
						}
					}
				}
			}
		});
	</script>
	<script>
		$('.switch-input').on('click', function() {
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
				success: function() {
					document.location.href = "<?= base_url('admin'); ?>";
				}
			})
		});
	</script>
<?php elseif ($title == "Edit Profile") : ?>
	<!-- AJAX Edit Profile  -->
	<script>
		$('.custom-file-input').on('change', function() {
			let fileName = $(this).val().split('\\').pop();
			$(this).next('.custom-file-label').addClass("selected").html(fileName);
		});
	</script>
<?php elseif ($title == "Role Access Page") : ?>
	<!-- AJAX change Access -->
	<script>
		$('.form-check-input').on('click', function() {
			const menuId = $(this).data('menu');
			const roleId = $(this).data('role');
			$.ajax({
				url: "<?= base_url('admin/changeaccess'); ?>",
				type: 'post',
				data: {
					menuId: menuId,
					roleId: roleId
				},
				success: function() {
					document.location.href = "<?= base_url('admin/roleAccess/'); ?>" + roleId;
				}
			})
		});
	</script>
<?php endif; ?>
</body>

</html>