<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="row">

		<div class="col-xl-9 col-md-9 mb-4">
			<!-- Area Chart -->
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Accelerator</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="chart-area">
						<canvas id="myAreaChart"></canvas>
					</div>
				</div>
			</div>

			<!-- Area Chart -->
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">5 Data Log Koordinat Terakhir</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="table-box">
						<div class="table-row table-head">
							<div class="table-cell first-cell">
								<p>No</p>
							</div>
							<div class="table-cell">
								<p>Waktu & Tanggal</p>
							</div>
							<div class="table-cell">
								<p>Longitude</p>
							</div>
							<div class="table-cell">
								<p>Latitude</p>
							</div>
							<div class="table-cell last-cell">
								<p>Detail</p>
							</div>
						</div>
						<?php $i = 1; ?>
						<?php foreach ($map as $m) : ?>
							<div class="table-row">
								<div class="table-cell first-cell">
									<p><?= $i; ?></p>
								</div>
								<div class="table-cell">
									<p><?= date('H:i:s \W\I\B d/m/Y', $m['time']); ?></p>
								</div>
								<div class="table-cell">
									<p><?= number_format($m['lon'], 6); ?></p>
								</div>
								<div class="table-cell">
									<p><?= number_format($m['lat'], 6); ?></p>
								</div>
								<div class="table-cell">
									<p><a href="http://maps.google.com/maps?z=17&t=k&q=loc:<?= number_format($m['lat'], 6); ?>,+<?= number_format($m['lon'], 6); ?>" target="_blank" class="badge badge-success">Lihat Lokasi</a></p>
								</div>
							</div>
							<?php $i++; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-md-3 mb-4">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Control Panel</h6>
				</div>
				<div class="card-body container-fluid">
					<!-- Looping Control -->
					<?= $this->session->flashdata('messege1'); ?>
					<div id="switch">
						<?php foreach ($kontrol as $cp) : ?>
							<div class="row">
								<div class="col-6 d-flex flex-row align-items-center justify-content-between">
									<h1 class="tlabel"><?= $cp['nama']; ?></h1>
								</div>
								<div class="col-5">
									<label class="switch">
										<input class="switch-input" type="checkbox" data-id="<?= $cp['id']; ?>" data-nama="<?= $cp['nama']; ?>" data-state="<?= $cp['state']; ?>" <?= check_switch($cp['id'], $cp['state']); ?>>
										<span class="slider"></span></label>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<!-- End Looping Control Panel -->
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->