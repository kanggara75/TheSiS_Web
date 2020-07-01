<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $user['name']?></h1>
	<div class="card mb-3" style="max-width: 540px;">
		<div class="row no-gutters">
			<div class="col-md-4">
				<img src="<?= base_url('assets/img/profile/') . $user['image'];?>" class="card-img"
					alt="<?= base_url('assets/img/profile/')?>2.png">
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<h5 class="card-title"><?= $user['name'];?></h5>
					<p class="card-text"><?=$user['email']?></p>
					<p class="card-text"><small class="text-muted">Member since
							<?= date('d F Y', $user['date_created'])?></small></p>
				</div>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-xl-9 col-md-9 mb-4">
			<!-- Area Chart -->
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Accelerator</h6>
					<div class="dropdown no-arrow">
						<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Data Log</a>
						</div>
					</div>
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
					<h6 class="m-0 font-weight-bold text-primary">Monitoring</h6>
					<div class="dropdown no-arrow">
						<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
					</div>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="chart-area">
						<canvas id="myAreaChart"></canvas>
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
						<?php foreach ($kontrol as $cp) :?>
						<div class="row">
							<div class="col-6 d-flex flex-row align-items-center justify-content-between">
								<h1 class="tlabel"><?= $cp['nama']; ?></h1>
							</div>
							<div class="col-5">
								<label class="switch">
										<input class="switch-input" type="checkbox" data-id="<?= $cp['id']; ?>" data-state="<?= $cp['state']; ?>" <?= check_switch($cp['id'],$cp['state']); ?>>
									<span class="slider"></span></label>
							</div>
						</div>
						<?php endforeach; ?>
						<!-- End Looping Control Panel -->
				</div>
			</div>
		</div>

	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
