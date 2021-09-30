<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<!-- /.card-header -->
					<div class="card-header">
					<a href="<?php echo site_url('mahasiswa/print/'. $data->nim) ?>" class="btn btn-block btn-danger">Export PDF</a>
					<a href="<?php echo site_url('mahasiswa') ?>" class="btn btn-block btn-secondary">Kembali</a>
					</div>
					<div class="card-body">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
 						<tr>
 							<th>Nama Mahasiswa</th>
							<th>Photo</th>
 							<th>Username</th>
 							<th>NIM</th>
 							<th>NIK</th>
 							<th>Jenis Kelamin</th>
 							<th>TTL</th>
 							<th>Perguruan Tinggi</th>
 							<th>Program Studi</th>
							<th>Nomer Telepon</th>
							<th>Akun Instagram</th>
							<th>Akun Facebook</th>
							<th>Nama Keluarga</th>
							<th>Hubungan</th>
						 	<th>Nomer Telepon</th>
							<th>Bank</th>
							<th>Nomer Rekening</th>
							<th>Nama Pemilik</th>
							<th>Tahun</th>
							<th>Batch</th>
							<th>Divre</th>
							<th>Bagian Unit</th>
							<th>Job Description</th>
							
 						</tr>
 					</thead>
 					<tbody>
 							<tr>
 								<td><?= ucfirst($data->nama) ?></td>
								<td><img width="40" height="40" src="<?php echo base_url('images/users/' . $data->photo); ?>"></td>
 								<td><?= ucfirst($data->username) ?></td>
 								<td><?= ucfirst($data->nim) ?></td>
 								<td><?= ucfirst($data->nik) ?></td>
 								<td><?= ucfirst($data->jenis_kelamin) ?></td>
 								<td><?= ucfirst($data->tempat_lahir) ?><?= ", " ?><?= ($data->tanggal_lahir) ?></td>
 								<td><?= ucfirst($data->perguruan_tinggi) ?></td>
 								<td><?= ucfirst($data->jurusan) ?></td>
								<td><?= ucfirst($data->telepon) ?></td>
								<td><?= ucfirst($data->akun_ig) ?></td>
								<td><?= ucfirst($data->akun_fb) ?></td>
								<td><?= ucfirst($data->nama_keluarga) ?></td>
								<td><?= ucfirst($data->hubungan) ?></td>
								<td><?= ucfirst($data->telepon_kel) ?></td>
								<td><?= ucfirst($data->bank) ?></td>
								<td><?= ucfirst($data->nomor_rek) ?></td>
								<td><?= ucfirst($data->nama_pemilik) ?></td>
								<td><?= ucfirst($data->tahun) ?></td>
								<td><?= ucfirst($data->batch) ?></td>
								<td><?= ucfirst($data->divre) ?></td>
								<td><?= ucfirst($data->bagian_unit) ?></td>
								<td><?= $data->jobdesk ?></td>
 							</tr>
 					</tbody>
						</table>
					</div>

				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>

</section>
