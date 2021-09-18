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
												<?php 
                                    echo anchor(site_url('mahasiswa/read/'.$mahasiswa->nim),'<button class="btn btn-sm btn-primary"><i class="nav-icon fas fa-eye"></i></button>'); 
                                    echo " ";
                                    echo anchor(site_url('mahasiswa/update/'.$mahasiswa->nim),'<button class="btn btn-sm btn-info"><i class="nav-icon fas fa-edit"></i></button>'); 
                                    echo " ";
                                    echo anchor(site_url('mahasiswa/delete/'.$mahasiswa->nim),'<button class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i></button>','onclick="javasciprt: return confirm(\'Anda yakin ingin menghapus data ini?\')"'); 
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
