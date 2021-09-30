<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<!-- /.card-header -->

					<div class="card-body">
						<div class="card-body">
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Nomor</th>
										<th>NIM</th>
										<th>Nama Mahasiswa</th>
										<th>Jenis Kelamin</th>
										<th>Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php
                                    $no =1;
                                    foreach ($aktivitas_data as $mahasiswa)
                                    {
                                    ?>
									<tr>
										<td width="80px"><?= $no++; ?></td>
										<td><?= $mahasiswa->nim?></td>
										<td><?= $mahasiswa->nama ?></td>
										<td><?= ucfirst($mahasiswa->jenis_kelamin)?></td>
										<td style="text-align:center" width="200px">
											<?php 
												echo anchor(site_url('aktivitas/read/'. $mahasiswa->nim),'<button class="btn btn-sm btn-primary"><i class="nav-icon fas fa-eye"></i> Lihat Data Aktivitas</button>'); 						
												?>
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
