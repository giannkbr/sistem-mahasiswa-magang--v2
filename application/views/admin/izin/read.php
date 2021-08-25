<section class="content">
	<div class="container-fluid">
	<div class="row">
	<div class="col-12">
		<div class="card">
		<div class="card-header">
					<a href="<?php echo site_url('izin/print/' . $mahasiswa->nim) ?>" class="btn btn-block btn-danger">Export PDF</a>
					<a href="<?php echo site_url('izin') ?>" class="btn btn-block btn-secondary">Kembali</a>
					</div>
			<div class="card-body">
			<table id="example1" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Nomor</th>
							<th>Nama</th>
							<th>Jenis Izin</th>
							<th>Waktu</th>
							<th>Keterangan</th>
							<th>Status</th>
							<th>Opsi</th>
						</tr>
					</thead>

					<tbody>
						<?php $no = 1;
						foreach ($data as $d) {
							$cek = $this->db->query("select min(tanggal) as mulai,max(tanggal) as akhir from detailizin where izin_id = '$d->izin_id' ")->row();
						?>
							<tr>
								<td width="1%"><?= $no++ ?></td>
								<td><?= ucfirst($d->nama) ?></td>
								<td><?= ucfirst($d->jenis_cuti) ?></td>
								<td><?= date('d/m/Y', strtotime($cek->mulai)) ?> - <?= date('d/m/Y', strtotime($cek->akhir)) ?></td>
								<td>
									<?= ucfirst($d->alasan) ?><br>
									<?php if ($d->jenis_cuti == 'sakit') { ?>
										<small>Bukti <a target="_blank" href="<?= base_url('images/users/' . $d->bukti) ?>">Klik disini</a></small>
									<?php } ?>
								</td>
								<td><?= ucfirst($d->status) ?></td>
								<td>
									<?php if ($d->status == 'diajukan') { ?>
										<a onclick="return confirm('Apakah anda yakin ingin menerima pengajuan izin ini?')" href="<?= base_url('izin/izin_terima/' . $d->izin_id) ?>" class="btn btn-primary btn-sm"><span class="fa fa-check"></span></a>
										<a onclick="return confirm('Apakah anda yakin ingin menolak pengajuan izin ini?')" href="<?= base_url('izin/izin_tolak/' . $d->izin_id) ?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
									<?php } ?>
									<?php if ($d->status == 'diterima') { ?>
										<button class="btn btn-primary btn-sm">Izin diterima</button>
									<?php } ?>
									<?php if ($d->status == 'ditolak') { ?>
										<button class="btn btn-danger btn-sm">Izin ditolak</button>
									<?php } ?>
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
</section>
