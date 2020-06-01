<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-lg">

			<div class="card o-hidden border-0 shadow-lg my-2">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h1 font-weight-bold text-gray-900 mb-4">Kuisioner Penelitian</h1>
									<h1 class="h2 text-gray-900">SMART EARLY WARNING SYSTEM UNTUK KEAMANAN</h1>
									<h1 class="h2 text-gray-900">SEPEDA MOTOR BERBASIS PROSESOR XTENSA LX6</h1>
									<hr>
								</div>
								<!-- Mulai -->
								<form class="user" method="get" action="<?= base_url('kuisioner')?>">
									<!-- Seksi 1 -->
									<div class="text-left">
										<h1 class="h3 font-weight-bold text-gray-900 mt-5">1. Identitas Responden</h1>
									</div>
									<div class="text-left ml-4 mb-4">
										<table>
											<tr>
												<td>Nama Lengkap</td>
												<td>:&nbsp</td>
												<td>
													<input type="name" class="form-control form-control-sm" id="name" name="name"
														placeholder="Full Name" required>
												</td>
											</tr>
											<tr>
												<td>Jenis Kelamin</td>
												<td>:</td>
												<td>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="jk" id="jk" value="lk">
														<label class="form-check-label" for="jk">
															Laki-Laki
														</label>
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="jk" id="jk" value="pr">
														<label class="form-check-label" for="jk">
															Perempuan
														</label>
													</div>
												</td>
											</tr>
											<tr>
												<td>Usia</td>
												<td>:</td>
												<td>
													<input type="number" class="form-control form-control-sm" id="usia" name="usia"
														placeholder="Usia" required>
												</td>
											</tr>
											<tr>
												<td>Jenis Sepeda Motor &nbsp&nbsp&nbsp</td>
												<td>:</td>
												<td>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="motor" id="motor" value="matic">
														<label class="form-check-label" for="motor">
															Matic
														</label>
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="motor" id="motor" value="bebek">
														<label class="form-check-label" for="motor">
															Bebek
														</label>
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="motor" id="motor" value="sport">
														<label class="form-check-label" for="motor">
															Sport
														</label>
													</div>
												</td>
											</tr>
										</table>
										<hr>
									</div>

									<!-- Seksi 2 -->
									<div class="text-left">
										<h1 class="h3 font-weight-bold text-gray-900 mt-5">2. Daftar Pertanyaan</h1>
									</div>
									<!-- Bagian A -->
									<div class="text-left">
										<h1 class="h4 text-gray-900 ml-4">A. Kemanan</h1>
									</div>
									<div class="table-responsive ml-4">
										<table class="table table-bordered">
											<thead class="thead-light">
												<tr>
													<th scope="col">No.</th>
													<th scope="col">Pertanyaan</th>
													<th scope="col">Jawaban</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th scope="row">1</th>
													<td>
														Apakah anda sering meninggalkan Kunci pada sepeda motor?
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="A1" id="A1" value="yes" checked>
															<label class="form-check-label" for="A1">
																Ya
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="A1" id="A1" value="no">
															<label class="form-check-label" for="A1">
																Tidak
															</label>
														</div>
													</td>
												</tr>
												<tr>
													<th scope="row">2</th>
													<td>
														Apakah anda sering lupa mencabut kunci sepeda motor dari stop kontak?
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="A2" id="A2" value="yes" checked>
															<label class="form-check-label" for="A2">
																Ya
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="A2" id="A2" value="no">
															<label class="form-check-label" for="A2">
																Tidak
															</label>
														</div>
													</td>
												</tr>
												<tr>
													<th scope="row">3</th>
													<td>
														Apakah penggunaan GPS pada sepeda motor akan meningkatkan keamananya?
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="A3" id="A3" value="yes" checked>
															<label class="form-check-label" for="A3">
																Ya
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="A3" id="A3" value="no">
															<label class="form-check-label" for="A3">
																Tidak
															</label>
														</div>
													</td>
												</tr>
												<tr>
													<th scope="row">4</th>
													<td>
														Apakah penggunaan sistem remot kontrol pada sepeda motor akan meningkatkan keamananya?
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="A4" id="A4" value="yes" checked>
															<label class="form-check-label" for="A4">
																Ya
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="A4" id="A4" value="no">
															<label class="form-check-label" for="A4">
																Tidak
															</label>
														</div>
													</td>
												</tr>
												<tr>
													<th scope="row">5</th>
													<td>
														Apakah Pengunaan aplikasi android sebagai remot kontrol akan meningkatkan keamanan sepeda
														motor?
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="A5" id="A5" value="yes" checked>
															<label class="form-check-label" for="A5">
																Ya
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="A5" id="A5" value="no">
															<label class="form-check-label" for="A5">
																Tidak
															</label>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<!-- Bagian B -->
									<div class="text-left">
										<h1 class="h4 text-gray-900 ml-4 mt-3">B. Keberguanan</h1>
									</div>
									<div class="table-responsive ml-4">
										<table class="table table-bordered">
											<thead class="thead-light">
												<tr>
													<th scope="col">No.</th>
													<th scope="col">Pertanyaan</th>
													<th scope="col">Jawaban</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th scope="row">1</th>
													<td>
														Apakah penggunaan sistem peringatan dini untuk mencabut kunci pada sepeda motor berguna?
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B1" id="B1" value="STB">
															<label class="form-check-label" for="B1">
																Sangat Tidak Berguna
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B1" id="B1" value="TB">
															<label class="form-check-label" for="B1">
																Tidak Berguna
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B1" id="B1" value="CB">
															<label class="form-check-label" for="B1">
																Cukup Berguna
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B1" id="B1" value="B" checked>
															<label class="form-check-label" for="B1">
																Berguna
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B1" id="B1" value="SB">
															<label class="form-check-label" for="B1">
																Sangat Berguna
															</label>
														</div>
													</td>
												</tr>
												<tr>
													<th scope="row">2</th>
													<td>
														Apakas Penggunaan sistem Notifikasi pada saat posisi sepeda motor berubah berguna?
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B2" id="B2" value="STB">
															<label class="form-check-label" for="B2">
																Sangat Tidak Berguna
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B2" id="B2" value="TB">
															<label class="form-check-label" for="B2">
																Tidak Berguna
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B2" id="B2" value="CB">
															<label class="form-check-label" for="B2">
																Cukup Berguna
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B2" id="B2" value="B" checked>
															<label class="form-check-label" for="B2">
																Berguna
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B2" id="B2" value="SB">
															<label class="form-check-label" for="B2">
																Sangat Berguna
															</label>
														</div>
													</td>
												</tr>
												<tr>
													<th scope="row">3</th>
													<td>
														Apakah penggunaan alarm pada sepeda motor saat motor bergerak/goyang diparkiran berguna?
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B3" id="B3" value="STB">
															<label class="form-check-label" for="B3">
																Sangat Tidak Berguna
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B3" id="B3" value="TB">
															<label class="form-check-label" for="B3">
																Tidak Berguna
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B3" id="B3" value="CB">
															<label class="form-check-label" for="B3">
																Cukup Berguna
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B3" id="B3" value="B" checked>
															<label class="form-check-label" for="B3">
																Berguna
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B3" id="B3" value="SB">
															<label class="form-check-label" for="B3">
																Sangat Berguna
															</label>
														</div>
													</td>
												</tr>
												<tr>
													<th scope="row">4</th>
													<td>
														Apakah sistem pelacakan lokasi dan remot kontrol sepeda motor menggunakan aplikasi android
														berguna?
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B4" id="B4" value="STB">
															<label class="form-check-label" for="B4">
																Sangat Tidak Berguna
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B4" id="B4" value="TB">
															<label class="form-check-label" for="B4">
																Tidak Berguna
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B4" id="B4" value="CB">
															<label class="form-check-label" for="B4">
																Cukup Berguna
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B4" id="B4" value="B" checked>
															<label class="form-check-label" for="B4">
																Berguna
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B4" id="B4" value="SB">
															<label class="form-check-label" for="B4">
																Sangat Berguna
															</label>
														</div>
													</td>
												</tr>
												<tr>
													<th scope="row">5</th>
													<td>
														Apakah penggunaan sistem kendali kelistrikan jarak jauh pada sepeda motor berguna?
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B5" id="B5" value="STB">
															<label class="form-check-label" for="B5">
																Sangat Tidak Berguna
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B5" id="B5" value="TB">
															<label class="form-check-label" for="B5">
																Tidak Berguna
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B5" id="B5" value="CB">
															<label class="form-check-label" for="B5">
																Cukup Berguna
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B5" id="B5" value="B" checked>
															<label class="form-check-label" for="B5">
																Berguna
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="B5" id="B5" value="SB">
															<label class="form-check-label" for="B5">
																Sangat Berguna
															</label>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<!-- Bagian C -->
									<div class="text-left">
										<h1 class="h4 text-gray-900 ml-4 mt-3">C. Kemudahan</h1>
									</div>
									<div class="table-responsive ml-4 mb-4">
										<table class="table table-bordered">
											<thead class="thead-light">
												<tr>
													<th scope="col">No.</th>
													<th scope="col">Pertanyaan</th>
													<th scope="col">Jawaban</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th scope="row">1</th>
													<td>
														Apakah instalasi sistem keamanan pada sepeda motor mudah dilakukan?
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C1" id="C1" value="SS">
															<label class="form-check-label" for="C1">
																Sangat Sulit
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C1" id="C1" value="S">
															<label class="form-check-label" for="C1">
																Sulit
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C1" id="C1" value="SM">
															<label class="form-check-label" for="C1">
																Cukup Mudah
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C1" id="C1" value="M" checked>
															<label class="form-check-label" for="C1">
																Mudah
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C1" id="C1" value="SM">
															<label class="form-check-label" for="C1">
																Sangat Mudah
															</label>
														</div>
													</td>
												</tr>
												<tr>
													<th scope="row">2</th>
													<td>
														Apakah proses instalasi aplikasi remot kontrol pada smartphone android mudah dilakukan?
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C2" id="C2" value="SS">
															<label class="form-check-label" for="C2">
																Sangat Sulit
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C2" id="C2" value="S">
															<label class="form-check-label" for="C2">
																Sulit
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C2" id="C2" value="SM">
															<label class="form-check-label" for="C2">
																Cukup Mudah
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C2" id="C2" value="M" checked>
															<label class="form-check-label" for="C2">
																Mudah
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C2" id="C2" value="SM">
															<label class="form-check-label" for="C2">
																Sangat Mudah
															</label>
														</div>
													</td>
												</tr>
												<tr>
													<th scope="row">3</th>
													<td>
														Apakah penggunaan aplikasi android sebagai remot control mudah digunakan?
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C3" id="C3" value="SS">
															<label class="form-check-label" for="C3">
																Sangat Sulit
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C3" id="C3" value="S">
															<label class="form-check-label" for="C3">
																Sulit
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C3" id="C3" value="SM">
															<label class="form-check-label" for="C3">
																Cukup Mudah
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C3" id="C3" value="M" checked>
															<label class="form-check-label" for="C3">
																Mudah
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C3" id="C3" value="SM">
															<label class="form-check-label" for="C3">
																Sangat Mudah
															</label>
														</div>
													</td>
												</tr>
												<tr>
													<th scope="row">4</th>
													<td>
														Apakah seluruh fingsi yang ada pada sistem keamanan sepeda motor mudah untuk dimengerti?
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C4" id="C4" value="SS">
															<label class="form-check-label" for="C4">
																Sangat Sulit
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C4" id="C4" value="S">
															<label class="form-check-label" for="C4">
																Sulit
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C4" id="C4" value="SM">
															<label class="form-check-label" for="C4">
																Cukup Mudah
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C4" id="C4" value="M" checked>
															<label class="form-check-label" for="C4">
																Mudah
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C4" id="C4" value="SM">
															<label class="form-check-label" for="C4">
																Sangat Mudah
															</label>
														</div>
													</td>
												</tr>
												<tr>
													<th scope="row">5</th>
													<td>
														Apakah proses pengisisan daya pada sistem pengaman menggunakan konektor USB mudah dilakukan?
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C5" id="C5" value="SS">
															<label class="form-check-label" for="C5">
																Sangat Sulit
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C5" id="C5" value="S">
															<label class="form-check-label" for="C5">
																Sulit
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C5" id="C5" value="SM">
															<label class="form-check-label" for="C5">
																Cukup Mudah
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C5" id="C5" value="M" checked>
															<label class="form-check-label" for="C5">
																Mudah
															</label>
														</div>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="C5" id="C5" value="SM">
															<label class="form-check-label" for="C5">
																Sangat Mudah
															</label>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>




									<button type="submit" class="btn btn-primary btn-user btn-block">
										Kirim
									</button>
								</form>
								<hr>
								<div class="copyright text-center my-auto">
									<span class=”copy-left”>Copyright &copy; KAnggara75 <?= date('F Y')?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
