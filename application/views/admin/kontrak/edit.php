<section class="container">
    <section class="container-fluid">
    <div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="<?= base_url('kontrak/update/' . $data->kontrak_id) ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" id="ganti_kontrak" value="<?= $data->kontrak ?>" name="ganti_kontrak" class="form-control" placeholder="Pas Photo">
                    <input type="hidden" name="kontrak_id" value="<?php echo $data->kontrak_id; ?>" />
                    <div class="form-group row">
						<label for="nim" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
						<div class="col-sm-10">
							<select name="nim" class="form-control">
								<option value="" selected="" disabled="">Pilih Nama Mahasiswa</option>
								<?php foreach ($mahasiswa as $mahasiswa) { ?>
									<option <?php if ($data->nim == $mahasiswa->nim) {
												echo "selected";
											} ?> value="<?= $mahasiswa->nim ?>"><?= $mahasiswa->nama ?></option>
								<?php } ?>
							</select>
							<?= form_error('nim', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>


					<div class="form-group row">
						<label class="col-sm-2 col-form-label" for="no_kontrak">Nomor Kontrak</label>
						<div class="col-sm-10">
							<input type="text" id="no_kontrak" name="no_kontrak" value="<?= $data->no_kontrak ?>" class=" form-control" placeholder="Nomor Kontrak">
							<?= form_error('no_kontrak', '<span class="text-danger small">', '</span>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label" for="tanggal_kontrak">Tanggal Kontrak</label>
						<div class="col-sm-10">
							<input type="date" id="tanggal_kontrak" name="tanggal_kontrak" value="<?= $data->tanggal_kontrak ?>" class="form-control" placeholder="Tanggal Kontrak">
							<?= form_error('tanggal_kontrak', '<span class="text-danger small">', '</span>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label" for="perihal">Perihal</label>
						<div class="col-sm-10">
							<input type="text" id="perihal" name="perihal" value="<?= $data->perihal ?>" class="form-control" placeholder="Perihal">
							<?= form_error('perihal', '<span class="text-danger small">', '</span>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label" for="kontrsk">Uang Saku</label>
						<div class="col-sm-10">
							<input type="text" id="upah" value="<?= $data->upah ?>" name="upah" class="form-control" placeholder="Uang Saku">
							<?= form_error('upah', '<span class="text-danger small">', '</span>'); ?>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label" for="kontrak">File Kontrak</label>
						<div class="col-sm-10">
							<div class="list-group">
								<?php if (!empty($data)) : ?>
									<input type="text" id="kontrak" name="kontrak" class="form-control" value="<?= $data->kontrak ?>" placeholder="Data Kontrak">
								<?php else : ?>
									<input type="text" id="kontrak" name="kontrak" class="form-control" value="<?= base_url('images/users/kontrak/default.pdf') ?>" placeholder="Data Kontrak">
								<?php endif ?>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label" for="kontrak">Upload File kontrak</label>
						<div class="col-sm-10">
							<input type="file" id="kontrak" name="kontrak" class="form-control" placeholder="File Kontrak">
							<?= form_error('kontrak', '<span class="text-danger small">', '</span>'); ?>
						</div>
					</div>
					<div class="form-group row align-items-center">
						<div class="col-sm-12">
							<button class="btn btn-primary btn-block" type="submit"><i class="fa fa-plus-circle"></i> Tambah Data</button>
						</div>
					</div>
				</form>
				<a href="<?= base_url('kontrak'); ?>">
					<button class="btn btn-secondary btn-block"> <i class="far fa-arrow-alt-circle-left"></i> Kembali</button>
				</a>
			</div>
		</div>
	</div> <!-- end col -->
</div> <!-- end row -->

    </section>
</section>