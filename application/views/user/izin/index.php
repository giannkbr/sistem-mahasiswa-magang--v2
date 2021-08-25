<section class="content">
	<div class="container-fluid">
		<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<a href="<?= base_url('user/izin/add/' . encrypt_url($this->session->userdata('nim'))); ?>"><button class="btn btn-primary btn-block mb-2">
						<i class="fa fa-plus-circle"></i> Tambah Data Permohonan Izin
					</button>
				</a>

			<table id="example1" class="table table-bordered table-hover">
					<thead>
						<th width="1%">No</th>
						<th>Nama</th>
						<th>Jenis</th>
						<th>Waktu</th>
						<th>Keterangan</th>
						<th>Status</th>
						<th>Opsi</th>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($data as $d) {
							$cek = $this->db->query(" select min(tanggal) as mulai,max(tanggal) as akhir from detailizin where izin_id = '$d->izin_id' ")->row();
						?>
							<tr>
								<td width="1%"><?= $no++ ?></td>
								<td><?= ucfirst($d->nama) ?></td>
								<td><?= ucfirst($d->jenis_izin) ?></td>
								<td><?= date('d/m/Y', strtotime($cek->mulai)) ?> - <?= date('d/m/Y', strtotime($cek->akhir)) ?></td>
								<td>
									<?= ucfirst($d->alasan) ?><br>
									<?php if ($d->jenis_izin == 'sakit') { ?>
										<small>Bukti <a target="_blank" href="<?= base_url('./images/' . $d->bukti) ?>">Klik disini</a></small>
									<?php } ?>
								</td>
								<td><?= ucfirst($d->status) ?></td>
								<td>
									<?php if ($d->status == 'diajukan') { ?>
										<a onclick="return confirm('Apakah anda yakin ingin menghapus pengajuan izin ini?')" href="<?= base_url('user/izin/delete/' . $d->izin_id) ?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
									<?php } ?>
									<?php if ($d->status == 'diterima') { ?>
										<button class="btn btn-primary btn-sm">Pengajuan anda diterima</button>
									<?php } ?>
									<?php if ($d->status == 'ditolak') { ?>
										<button class="btn btn-danger btn-sm">Pengajuan anda ditolak</button>
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