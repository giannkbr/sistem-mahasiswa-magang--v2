<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<!-- /.card-header -->
					<div class="card-body">
							<div class="col-md-12">
								<?php echo anchor(site_url('kontrak/create'),'Tambah Data', 'class="btn btn-block bg-primary"'); ?>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<table id="example1" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>Nomor</th>
											<th>Nama Mahasiswa</th>
											<th>Nomor Kontrak</th>
											<th>Tanggal Kontrak</th>
											<th>Perihal</th>
											<th>Uang Saku</th>
											<th>File Kontrak</th>
											<th>Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php
                                    $no =1;
                                    foreach ($kontrak_data as $kontrak)
                                    {
                                    ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= ucfirst($kontrak->nama) ?></td>
											<td><?= ucfirst($kontrak->no_kontrak) ?></td>
											<td><?= ucfirst($kontrak->tanggal_kontrak) ?></td>
											<td><?= ucfirst($kontrak->perihal) ?></td>
											<td><?= "Rp " . number_format($kontrak->upah, 0, ",", ".") ?></td>
											<td> <small><a target="_blank"
														href="<?= base_url('images/users/kontrak/' . $kontrak->kontrak) ?>">Klik
                                                            disini</a></small></td>
                                            <td style="text-align:center" width="150px">
                                                <?php 
                                                echo anchor(site_url('kontrak/update/'.$kontrak->kontrak_id),'<button class="btn btn-sm btn-info"><i class="nav-icon fas fa-edit"></i></button>'); 
                                                echo " ";
                                                echo anchor(site_url('kontrak/delete/'.$kontrak->kontrak_id),'<button class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i></button>','onclick="javasciprt: return confirm(\'Anda yakin ingin menghapus data ini?\')"'); 
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
