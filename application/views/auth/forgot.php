<div class="container">
	<!-- Outer Row -->
	<div class="row justify-content-center">
		<div class="col-lg-7">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg">
							<div class="p-5">
								<div class="text-center">
									<img width="80px" src="<?= base_url('assets/') ?>img/icon.png"
										style="margin: 0 auto;vertical-align:middle;">
									<h1 class="h4 text-gray-900 mb-4">Reset Your Password?</h1>
								</div>
								<?= $this->session->flashdata('messege');?>
								<form class="user" method="post" action="<?= base_url('auth/forgot')?>">
									<div class="form-group">
										<input type="text" class="form-control form-control-user" id="email"
											placeholder="Enter Email Address..." name="email" value="<?= set_value('name');?>">
										<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<button type="submit" class="btn btn-primary btn-user btn-block">
										Reset Password
									</button>
								</form>
								<hr>
								<div class="text-center">
									<a class="small" href="<?= base_url('auth') ?>">Login</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>
