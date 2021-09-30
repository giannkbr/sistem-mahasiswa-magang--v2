<section class="content">
	<div class="container-fluid">
		<form action="<?= base_url('mahasiswa/update/' . $data->nim) ?>" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Data Pribadi</h3>
						</div>
						<div class="card-body">
							<input type="hidden" name="nim" value="<?php echo $data->nim; ?>" />
							<div class="row form-group">
								<label for="email">Nama</label>
								<input type="text" id="nama" name="nama" class="form-control" placeholder="nama"
									value="<?= $data->nama; ?>">
								<?= form_error('nama', '<span class="text-danger small">', '</span>'); ?>
							</div>
							<div class="row form-group">
								<label for="email">Username</label>
								<input type="text" id="username" name="username" class="form-control"
									placeholder="Username" value="<?= $data->username; ?>">
								<?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
							</div>
							<div class="row form-group">
								<label for="nim">NIM</label>
								<input type="text" id="nim" name="nim" class="form-control" placeholder="NIM"
									value="<?= $data->nim; ?>">
								<?= form_error('nim', '<span class="text-danger small">', '</span>'); ?>
							</div>
							<div class="row form-group">
								<label for="nik">NIK</label>
								<input type="text" id="nik" name="nik" class="form-control" placeholder="NIK"
									value="<?= $data->nik; ?>">
								<?= form_error('nik', '<span class="text-danger small">', '</span>'); ?>
							</div>

							<div class="row form-group">
								<label for="jenis_kelamin">Jenis Kelamin</label>
								<div class="col-sm-10">
									<div class="custom-control custom-radio">
										<input
											<?= $data->jenis_kelamin == 'laki-laki' ? 'checked' : ''; ?><?= set_radio('jenis_kelamin', 'laki-laki'); ?>
											type="radio" value="laki-laki" id="laki-laki" name="jenis_kelamin"
											class="custom-control-input">
										<label class="custom-control-label" for="laki-laki">Laki- Laki</label>
									</div>
									<div class="custom-control custom-radio">
										<input
											<?= $data->jenis_kelamin == 'perempuan' ? 'checked' : ''; ?><?= set_radio('jenis_kelamin', 'perempuan'); ?>
											value="perempuan" type="radio" id="perempuan" name="jenis_kelamin"
											class="custom-control-input">
										<label class="custom-control-label" for="perempuan">Perempuan</label>
									</div>
								</div>
								<?= form_error('jenis_kelamin', '<span class="text-danger small">', '</span>'); ?>
							</div>

							<div class="row form-group">
								<label for="tempat_lahir">Tempat Lahir</label>
								<input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control"
									placeholder="Tempat Lahir" value="<?= $data->tempat_lahir; ?>">
								<?= form_error('tempat_lahir', '<span class="text-danger small">', '</span>'); ?>
							</div>

							<div class="row form-group">
								<label for="tanggal_lahir">Tanggal lahir</label>
								<input name="tanggal_lahir" id="tanggal_lahir" type="date" class="form-control date"
									placeholder="Tanggal Lahir" value="<?= $data->tanggal_lahir; ?>">
								<?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>'); ?>
							</div>

							<div class="row form-group">
								<label for="perguruan_tinggi">Perguruan Tinggi</label>
								<input type="text" id="perguruan_tinggi" name="perguruan_tinggi" class="form-control"
									placeholder="Perguruan Tinggi" value="<?= $data->perguruan_tinggi; ?>">
								<?= form_error('perguruan_tinggi', '<span class="text-danger small">', '</span>'); ?>
							</div>

							<div class="row form-group">
								<label for="jurusan">Program Studi</label>
								<input type="text" id="jurusan" name="jurusan" class="form-control"
									placeholder="Program Studi" value="<?= $data->jurusan; ?>">
								<?= form_error('jurusan', '<span class="text-danger small">', '</span>'); ?>
							</div>

							<div class="row form-group">
								<label for="telepon">Nomer Telepon</label>
								<input type="text" id="telepon" name="telepon" class="form-control"
									placeholder="Nomer Telepon" value="<?= $data->telepon; ?>">
								<?= form_error('telepon', '<span class="text-danger small">', '</span>'); ?>
							</div>

							<div class="row form-group">
								<label for="akun_ig">Akun Instagram</label>
								<input type="text" id="akun_ig" name="akun_ig" class="form-control"
									placeholder="Akun Instagram" value="<?= $data->akun_ig; ?>">
							</div>

							<div class="row form-group">
								<label for="akun_fb">Akun Facebook</label>
								<input type="text" id="akun_fb" name="akun_fb" class="form-control"
									placeholder="Akun Facebook" value="<?= $data->akun_fb; ?>">
							</div>

							<div class="row form-group">
								<label for="photo">Pas Photo</label>
								<div class="col-sm-10">
									<div class="list-group">
										<?php if (!empty($data)) : ?>
										<img src="<?php echo base_url('images/users/' . $data->photo) ?>"
											style="width: 200px; height: 200px;">
										<?php else : ?>
										<img src="<?php echo base_url('images/users/default.png') ?>"
											style="width: 200px; height: 200px;">
										<?php endif ?>
									</div>
								</div>
								<label for="photo">Upload Pas Photo</label>
								<div class="col-sm-10">
									<input type="file" id="photo" name="photo" class="form-control"
										placeholder="Pas Photo">
									<?= form_error('photo', '<span class="text-danger small">', '</span>'); ?>
								</div>
							</div>

							<div class="form-group row">
								<label for="role_id" class="">Role Akun</label>
								<select name="role_id" class="form-control">
									<option value="" selected="" disabled="">Pilih Role</option>
									<option <?php if ($data->role_id == '1') {
												echo 'selected';
											} ?> value="1">Administrator</option>
									<option <?php if ($data->role_id == '2') {
												echo 'selected';
											} ?> value="2">Mahasiswa</option>
								</select>
								<?= form_error('role_id', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Data Keluarga</h3>
						</div>
						<div class="card-body">
							<div class="row form-group">
								<label for="bank">Nama Keluarga</label>
								<input type="text" id="nama_keluarga" name="nama_keluarga" class="form-control"
									placeholder="Nama Keluarga" value="<?= $data->nama_keluarga; ?>">
								<?= form_error('nama_keluarga', '<span class="text-danger small">', '</span>'); ?>
							</div>

							<div class="row form-group">
								<label for="nomer_rek">Hubungan</label>
								<input type="text" id="hubungan" name="hubungan" class="form-control"
									placeholder="Hubungan" value="<?= $data->hubungan; ?>">
								<?= form_error('hubungan', '<span class="text-danger small">', '</span>'); ?>
							</div>

							<div class="row form-group">
								<label for="bank">Nomer Telepon</label>
								<input type="text" id="telepon_kel" name="telepon_kel" class="form-control"
									placeholder="Nomor Telepon Keluarga" value="<?= $data->telepon_kel; ?>">
								<?= form_error('telepon_kel', '<span class="text-danger small">', '</span>'); ?>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Data Bank</h3>
						</div>
						<div class="card-body">
							<div class="row form-group">
								<label for="bank">Nama Bank</label>
								<input type="text" id="bank" name="bank" class="form-control" placeholder="Nama Bank"
									value="<?= $data->bank; ?>">
								<?= form_error('bank', '<span class="text-danger small">', '</span>'); ?>
							</div>

							<div class="row form-group">
								<label for="nomer_rek">Nomor Rekening</label>
								<input type="text" id="nomor_rek" name="nomor_rek" class="form-control"
									placeholder="Nomor Rekening" value="<?= $data->nomor_rek; ?>">
								<?= form_error('nomor_rek', '<span class="text-danger small">', '</span>'); ?>
							</div>

							<div class="row form-group">
								<label for="bank">Nama Pemilik</label>
								<input type="text" id="nama_pemilik" name="nama_pemilik" class="form-control"
									placeholder="Nama Pemilik" value="<?= $data->nama_pemilik; ?>">
								<?= form_error('nama_pemilik', '<span class="text-danger small">', '</span>'); ?>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Data Magang</h3>
						</div>
						<div class="card-body">
							<div class="row form-group">
								<label for="bank">Tahun Masuk</label>
								<input type="text" id="tahun" name="tahun" class=" form-control"
									placeholder="Tahun Masuk" value="<?= $data->tahun; ?>">
								<?= form_error('tahun', '<span class="text-danger small">', '</span>'); ?>
							</div>

							<div class="row form-group">
								<label for="nomer_rek">Batch</label>
								<input type="text" id="batch" name="batch" class="form-control"
									placeholder="Batch Masuk" value="<?= $data->batch; ?>">
								<?= form_error('batch', '<span class="text-danger small">', '</span>'); ?>
							</div>

							<div class="row form-group">
								<label for="bank">Divre</label>
								<input type="text" id="divre" name="divre" class="form-control" placeholder="Divre"
									value="<?= $data->divre; ?>">
								<?= form_error('divre', '<span class="text-danger small">', '</span>'); ?>
							</div>
							
							<div class="row form-group">
								<label for="bank">Bagian Unit</label>
								<input type="text" id="bagian_unit" name="bagian_unit" class="form-control" placeholder="Bagian Unit"
									value="<?= $data->bagian_unit; ?>">
								<?= form_error('bagian_unitt', '<span class="text-danger small">', '</span>'); ?>
							</div>

							<div class="row form-group">
								<label for="bank">Job Description</label>
								<textarea name="jobdesk" id="jobdesk" cols="20" rows="5" class="form-control"
									placeholder="Job Description"><?= $data->jobdesk; ?></textarea>
								<?= form_error('jobdesk', '<span class="text-danger small">', '</span>'); ?>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-12">
					<div class="card-body">
						<div class="form-group">
						<button class="btn btn-primary btn-block" type="submit"><i
											class="fa fa-plus-circle"></i> Edit Data</button>
							<a href="<?php echo site_url('mahasiswa') ?>" class="btn btn-block btn-secondary"><i class="far fa-arrow-alt-circle-left"></i> Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</form>
</section>
