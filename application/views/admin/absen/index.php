<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
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
								$no = 1;
								foreach($data as $mahasiswa){
								?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $mahasiswa->nim ?></td>
									<td><?= ucfirst($mahasiswa->nama) ?></td>
									<td><?= ucfirst($mahasiswa->jenis_kelamin) ?></td>
									<td style="text-align:center" width="200px">
										<?= anchor(site_url('absen/read/' . $mahasiswa->nim), '<button class="btn btn-primary"><i class="nav-icon fas fa-eye"></i> Lihat Data Absen</button>') ?>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>