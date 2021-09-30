<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
							<div class="col-md-12">
								<?php echo anchor(site_url('nilai/create'),'Tambah Data', 'class="btn btn-block bg-primary"'); ?>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<table id="example1" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>Nomor</th>
											<th>Nama Mahasiswa</th>
											<th>Pemahaman Tentang Peran Mahasiswa Magang Dan Penyesuaian Diri</th>
											<th>Pemahaman Terhadap Bidang Usaha Dan Proses Bisnis Perusahaan</th>
											<th>Keberhasilan Pencapaian Learning Objectives Sesuai Learning Plan Yang
												Sudah Ditentukan</th>
											<th>Keluasan Wawasan Keilmuan Dan Penerapannya</th>
											<th>Kemampuan Merumuskan Permasalahan Dan Rencana Pemecehan</th>
											<th>Kemampuan Mencapai Target Pekerjaan</th>
											<th>Total Nilai Keseluruhan</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($data as $nilai) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= ucfirst($nilai->nama) ?></td>
											<td><?= ucfirst($nilai->nilai_a) ?></td>
											<td><?= ucfirst($nilai->nilai_b) ?></td>
											<td><?= ucfirst($nilai->nilai_c) ?></td>
											<td><?= ucfirst($nilai->nilai_d) ?></td>
											<td><?= ucfirst($nilai->nilai_e) ?></td>
											<td><?= ucfirst($nilai->nilai_f) ?></td>
											<td><?= ucfirst($nilai->total) ?></td>
											<td style="text-align:center" width="150px">
												<?php 
												echo anchor(site_url('nilai/print/'.$nilai->nilai_id),'<button class="btn btn-sm btn-warning"><i class="nav-icon fas fa-print"></i></button>'); 
												echo " ";
												echo anchor(site_url('nilai/update/'.$nilai->nilai_id),'<button class="btn btn-sm btn-info"><i class="nav-icon fas fa-edit"></i></button>'); 
												echo " ";
												echo anchor(site_url('nilai/delete/'.$nilai->nilai_id),'<button class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i></button>','onclick="javasciprt: return confirm(\'Anda yakin ingin menghapus data ini?\')"'); 
												?>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div> <!-- end col -->
				</div> <!-- end row -->
			</div>
		</div>
</section>
