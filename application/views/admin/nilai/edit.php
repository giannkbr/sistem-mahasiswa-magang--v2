<section class="content">
	<div class="container fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="<?= base_url('nilai/update/' . $detail->nilai_id) ?>" method="post">
						<input type="hidden" name="nilai_id" value="<?php echo $detail->nilai_id; ?>" />
							<div class="form-group row">
								<label for="nim" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
								<div class="col-sm-10">
									<select name="nim" class="form-control">
										<option value="" selected="" disabled="">Pilih Nama Mahasiswa</option>
										<?php foreach ($mahasiswa as $mahasiswa) { ?>
											<option <?php if ($detail->nim == $mahasiswa->nim) {
														echo "selected";
													} ?> value="<?= $mahasiswa->nim ?>"><?= $mahasiswa->nama ?></option>
										<?php } ?>
									</select>
									<?= form_error('nim', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="nilai_a">Pemahaman Tentang Peran Mahasiswa
									Magang Dan Penyesuaian Diri</label>
								<div class="col-sm-10">
									<input type="text" id="nilai_a" value="<?= $detail->nilai_a ?>" name="nilai_a"
										class="form-control" placeholder="Nilai Pertama">
									<?= form_error('nilai_a', '<span class="text-danger small">', '</span>'); ?>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="nilai_b">Pemahaman Terhadap Bidang Usaha Dan
									Proses Bisnis Perusahaan</label>
								<div class="col-sm-10">
									<input type="text" id="nilai_b" name="nilai_b" value="<?= $detail->nilai_b ?>"
										class="form-control" placeholder="Nilai Kedua">
									<?= form_error('nilai_b', '<span class="text-danger small">', '</span>'); ?>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="nilai_c">Keberhasilan Pencapaian Learning
									Objectives Sesuai Learning Plan Yang Sudah Ditentukan</label>
								<div class="col-sm-10">
									<input type="text" id="nilai_c" value="<?= $detail->nilai_c ?>" name="nilai_c"
										class="form-control" placeholder="Nilai Ketiga">
									<?= form_error('nilai_c', '<span class="text-danger small">', '</span>'); ?>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="nilai_d">Keluasan Wawasan Keilmuan Dan
									Penerapannya</label>
								<div class="col-sm-10">
									<input type="text" id="nilai_d" value="<?= $detail->nilai_d ?>" name="nilai_d"
										class="form-control" placeholder="Nilai Keempat">
									<?= form_error('nilai_d', '<span class="text-danger small">', '</span>'); ?>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="nilai_e">Kemampuan Merumuskan Permasalahan
									Dan Rencana Pemecehan</label>
								<div class="col-sm-10">
									<input type="text" id="nilai_e" value="<?= $detail->nilai_e ?>" name="nilai_e"
										class="form-control" placeholder="Nilai Kelima">
									<?= form_error('nilai_e', '<span class="text-danger small">', '</span>'); ?>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="nilai_f">Kemampuan Mencapai Target
									Pekerjaan</label>
								<div class="col-sm-10">
									<input type="text" id="nilai_f" value="<?= $detail->nilai_f ?>" name="nilai_f"
										class="form-control" placeholder="Nilai Keenam">
									<?= form_error('nilai_f', '<span class="text-danger small">', '</span>'); ?>
								</div>
							</div>

							<div class="form-group row">
								<label class="col-sm-2 col-form-label" for="total">Total Nilai Keseluruhan</label>
								<div class="col-sm-10">
									<input type="text" id="total" value="<?= $detail->total ?>" name="total"
										class="form-control" placeholder="Total Nilai" readonly="readonly">
									<?= form_error('total', '<span class="text-danger small">', '</span>'); ?>
								</div>
							</div>

							<!-- <div class="form-group row">
						<label class="col-sm-2 col-form-label" for="total">Klasifikasi</label>
						<div class="col-sm-10">
							<input type="text" id="ket" name="ket" class="form-control" placeholder="Klasifikasi" readonly="readonly">
							<?= form_error('ket', '<span class="text-danger small">', '</span>'); ?>
						</div>
					</div> -->

							<br>
							<div class="form-group row align-items-center">
								<div class="col-sm-12">
									<button class="btn btn-primary btn-block" type="submit"><i
											class="fa fa-plus-circle"></i> Edit Data</button>
								</div>
							</div>
						</form>
						<a href="<?= base_url('nilai'); ?>">
							<button class="btn btn-secondary btn-block"> <i class="far fa-arrow-alt-circle-left"></i>
								Kembali</button>
						</a>
					</div>
				</div>
			</div> <!-- end col -->
		</div> <!-- end row -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$("#nilai_a, #nilai_b, #nilai_c, #nilai_d, #nilai_e, #nilai_f").keyup(function () {
					var nilai_a = $("#nilai_a").val();
					var nilai_b = $("#nilai_b").val();
					var nilai_c = $("#nilai_c").val();
					var nilai_d = $("#nilai_d").val();
					var nilai_e = $("#nilai_e").val();
					var nilai_f = $("#nilai_f").val();

					var total = parseInt(nilai_a) + parseInt(nilai_b) + parseInt(nilai_c) + parseInt(nilai_d) +
						parseInt(nilai_e) + parseInt(nilai_f);
					$("#total").val(total);
				});
			});

			// $(document).ready(function() {
			// 	$("#total").keyup(function() {
			// 		var total = $("#total").val();
			// 		if ($("#total").val(total) >= 100) {
			// 			var ket = $("#ket").val(asu);
			// 		}
			// 	});
			// });

		</script>
	</div>
</section>
