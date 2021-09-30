<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<!-- /.card-header -->
					<div class="card-body">
						<div class="col-md-12">
							<?php echo anchor(site_url('mahasiswa/create'),'Tambah Data', 'class="btn btn-block bg-primary"'); ?>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Nomor</th>
										<th>Nama Mahasiswa</th>
										<th>Jenis Kelamin</th>
										<th>Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php
                                    $no =1;
                                    foreach ($mahasiswa_data as $mahasiswa)
                                    {
                                    ?>
									<tr>
										<td width="80px"><?= $no++; ?></td>
										<td><?= $mahasiswa->nama ?></td>
										<td><?= ucfirst($mahasiswa->jenis_kelamin)?></td>
										<td style="text-align:center">
										<a href="<?= base_url('mahasiswa/read/') . $mahasiswa->nim ?>"
												class="btn btn-circle btn-sm btn-primary"><i
													class="fa fa-fw fa-eyes"></i></a>
											<a href="<?= base_url('mahasiswa/toggle/') . $mahasiswa->nim ?>"
												class="btn btn-circle btn-sm <?= $mahasiswa->status ? 'btn-secondary' : 'btn-success' ?>"
												title="<?= $mahasiswa->status ? 'Nonaktifkan mahasiswa' : 'Aktifkan mahasiswa' ?>"><i
													class="fa fa-fw fa-power-off"></i></a>
											<a href="<?= base_url('mahasiswa/update/') . $mahasiswa->nim ?>"
												class="btn btn-circle btn-sm btn-warning"><i
													class="fa fa-fw fa-edit"></i></a>
											<a onclick="return confirm('Yakin ingin menghapus data?')"
												href="<?= base_url('mahasiswa/delete/') . $mahasiswa->nim ?>"
												class="btn btn-circle btn-sm btn-danger"><i
													class="fa fa-fw fa-trash"></i></a>
										</td>
										</td>
									</tr>
									<?php
                                    }
                                ?>
								</tbody>
							</table>
						</div>
					</div>
</section>