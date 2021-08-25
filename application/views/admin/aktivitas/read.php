<section class="content">
	<div class="container-fluid">
		<div class="row mt-3 justify-content-center">
			<div class="col-md-3">
				<form method="post">
					<div class="input-group">
						<select name="bulan" class="custom-select" id="inputGroupSelect04"
							aria-label="Example select with button addon">
							<option value="<?= date('m') ?>">Pilih Bulan</option>
							<option value="01" <?php echo ($bulan == '01') ? 'selected' : ''; ?>>Januari</option>
							<option value="02" <?php echo ($bulan == '02') ? 'selected' : '' ?>>Februari</option>
							<option value="03" <?php echo ($bulan == '03') ? 'selected' : '' ?>>Maret</option>
							<option value="04" <?php echo ($bulan == '04') ? 'selected' : '' ?>>April</option>
							<option value="05" <?php echo ($bulan == '05') ? 'selected' : '' ?>>Mei</option>
							<option value="06" <?php echo ($bulan == '06') ? 'selected' : '' ?>>Juni</option>
							<option value="07" <?php echo ($bulan == '07') ? 'selected' : '' ?>>Juli</option>
							<option value="08" <?php echo ($bulan == '08') ? 'selected' : '' ?>>Agustus</option>
							<option value="09" <?php echo ($bulan == '09') ? 'selected' : '' ?>>September</option>
							<option value="10" <?php echo ($bulan == '10') ? 'selected' : '' ?>>Oktober</option>
							<option value="11" <?php echo ($bulan == '11') ? 'selected' : '' ?>>November</option>
							<option value="12" <?php echo ($bulan == '12') ? 'selected' : '' ?>>Desember</option>
						</select>
						<select name="tahun" class="custom-select" id="inputGroupSelect04" aria-label="Tahun">
							<option value="<?= date('m') ?>">Pilih Tahun</option>
							<option value="2020" <?php echo ($tahun == '2020') ? 'selected' : ''; ?>>2020</option>
							<option value="2021" <?php echo ($tahun == '2021') ? 'selected' : '' ?>>2021</option>
						</select>
						<div class="input-group-append">
							<button name="submit" class="btn btn-outline-secondary" type="submit">Submit</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-6">
				<h5 class="text-center">Rekap Aktivitas Bulan (<?= $bulan. "-" . $tahun?>)</h5>
				<h4 class="text-center"><?= ucfirst($data->nama) ?></h4>
			</div>
			<div class="col-md-3">
				<div class="btn-group btn-block">
					<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">
						Print
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item"
							href="<?= base_url('aktivitas/cetak_aktivitas/').$data->nim ."/" .$bulan ?>"
							target="blank">Rekap Aktivitas Bulan </a>
						<a class="dropdown-item" href="#" data-toggle='modal' data-target='#pilih_tanggal'>Rekap Aktivitas Bulan</a>
					</div>

					<!-- Modal -->
					<div class="modal fade" id="pilih_tanggal" tabindex="-1" role="dialog"
						aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Pilih Tanggal yang akan diprint</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form class=""
										action="<?php echo site_url('aktivitas/cetak_aktivitas_tgl/').$data->nim?>"
										method="post" id="formtgl">
										<div class="form-row">
											<div class="form-group col-md-5">
												<label for="tgl_awal">Tanggal Mulai</label>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<input name="tgl_awal" type="date" class="form-control"
																placeholder="Pilih Tanggal">
														</div>
													</div>
												</div>
											</div>
											<div class="form-group col-md-2">
											</div>
											<div class="form-group col-md-5">
												<label for="end_h">Tanggal Akhir</label>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<input name="tgl_akhir" type="date" class="form-control"
																placeholder="Pilih Tanggal">
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
									<button type="button" class="btn btn-primary"
										onclick="$('#formtgl').submit()">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="btn-group btn-block">
					<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">
						Cetak PDF
					</button>
					<div class="dropdown-menu">
						<a class="dropdown-item"
							href="<?= base_url('aktivitas/cetak_aktivitas_pdf/').$data->nim. "/" .$bulan . "/" . $tahun ?>"
							target="blank">Rekap Aktivitas Bulanan</a>
						<a class="dropdown-item" href="#" data-toggle='modal' data-target='#pilih_tanggal'>Rekap Aktivitas
							per tanggal</a>
					</div>

					<!-- Modal -->
					<div class="modal fade" id="pilih_tanggal" tabindex="-1" role="dialog"
						aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Pilih Tanggal yang akan diprint</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form class=""
										action="<?php echo site_url('aktivitas/cetak_aktivitas_tgl_pdf/').$data->nim?>"
										method="post" id="formtgl">
										<div class="form-row">
											<div class="form-group col-md-5">
												<label for="tgl_awal">Tanggal Mulai</label>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<input name="tgl_awal" type="date" class="form-control"
																placeholder="Pilih Tanggal">
														</div>
													</div>
												</div>
											</div>
											<div class="form-group col-md-2">
											</div>
											<div class="form-group col-md-5">
												<label for="end_h">Tanggal Akhir</label>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<input name="tgl_akhir" type="date" class="form-control"
																placeholder="Pilih Tanggal">
														</div>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
									<button type="button" class="btn btn-primary"
										onclick="$('#formtgl').submit()">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row mt-3 mb-3">
        <div class="col-lg-12">
			<table id="example1" class="table table-bordered table-hover">
            <thead class="">
              <tr>
                <th scope="col" width="3%">No</th>
                <th scope="col" width="10%">Tanggal</th>
                <th scope="col" width="75%">Aktivitas Harian</th>
                <th scope="col" width="12%">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php 

            switch($bulan){
                case date('m'):
                    $tgl = date('d');
                break;
                case '01':
                    $tgl = 31;
                break;
                case '02':
                    $tgl = 29;
                break;
                case '03':
                    $tgl = 31;
                break;
                case '04':
                    $tgl = 30;
                break;
                case '05':
                    $tgl = 31;
                break;
                case '06':
                    $tgl = 30;
                break;
                case '07':
                    $tgl = 31;
                break;
                case '08':
                    $tgl = 31;
                break;
                case '09':
                    $tgl = 30;
                break;
                case '10':
                    $tgl = 31;
                break;
                case '11':
                    $tgl = 30;
                break;
                case '12':
                    $tgl = 31;
                break;
                default:
                    $tgl = date('d');
            break;
            }  
              $no = 1;
              //$tgl = date('d');
              $thn_bln = $tahun."-". $bulan;
              for ($i = 1; $i <= $tgl; $i++):
                //echo '<td>';
                if ($i<=9){
                    $tgl_select = '0'.$i;
                }else {
                    $tgl_select = $i;
                }

                $tgl_now = $tahun ."-". $bulan . "-". $tgl_select;
            ?>
              <tr>
                <th scope="row"><?= $no."."?></th>
                <td>
                    <?= $tgl_select ."-".$bulan."-". $tahun?>   
                </td>
                <?php
                    //echo '<td> aktivitas </td>';
                    
                      
                        // //$sql = "SELECT  `waktu_masuk`, `waktu_keluar`  FROM `tbl_absensi` WHERE `nip` = '". $peg['nip'] ."' && tgl_absen = '2020-04-". $tgl_select ."'";
                        $sql = "SELECT  * FROM `aktivitas` WHERE `nim` = '". $data->nim ."' && tgl_aktivitas = '".$thn_bln."-". $tgl_select ."' ORDER BY `jam_mulai` ASC";
                        $result = $this->db->query($sql)->result_array();
                        if ($result){
                            echo '<td>';
                            $urutan = 1;
                            foreach($result as $res){
                                
                                echo substr($res['jam_mulai'],0,5)."-". substr($res['jam_selesai'],0,5). " ";
                                echo "<i>". $res['isi_aktivitas'] . "</i>";
                                echo "    <a href='#' data-toggle='modal' data-target='#edit". $res['aktivitas_id']."' class='badge badge-success'> ubah </a></br>";
                                
                                ?>
                                 <!-- Modal -->
                                    <div class="modal fade" id="edit<?= $res['aktivitas_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Aktivitas</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form class="" action="<?php echo site_url('aktivitas/edit_aktivitas/').$res['aktivitas_id']."/1"; ?>" method="post" id="formadd<?= $res['aktivitas_id']; ?>">
                                        			 <input type="text" name="nim" value="<?= $res['nim'] ?>">
                                                    <div class="form-row">
                                                    <div class="form-group col-md-5">
                                                        <label for="start_h">Mulai</label>
                                                        <div class="row">
                                                        <?php
                                                            $jam_mulai = substr($res['jam_mulai'], 0, 2);
                                                            $menit_mulai = substr($res['jam_mulai'], 3, 2);
                                                            //echo $jam_mulai . ":" .$menit_mulai;
                                                        ?>
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="start_h">
                                                                <option value="01" <?php if($jam_mulai == '01') echo 'selected'; ?>>01</option>
                                                                <option value="02" <?php if($jam_mulai == '02') echo 'selected'; ?>>02</option>
                                                                <option value="03" <?php if($jam_mulai == '03') echo 'selected'; ?>>03</option>
                                                                <option value="04" <?php if($jam_mulai == '04') echo 'selected'; ?>>04</option>
                                                                <option value="05" <?php if($jam_mulai == '05') echo 'selected'; ?>>05</option>
                                                                <option value="06" <?php if($jam_mulai == '06') echo 'selected'; ?>>06</option>
                                                                <option value="07" <?php if($jam_mulai == '07') echo 'selected'; ?>>07</option>
                                                                <option value="08" <?php if($jam_mulai == '08') echo 'selected'; ?>>08</option>
                                                                <option value="09" <?php if($jam_mulai == '09') echo 'selected'; ?>>09</option>
                                                                <option value="10" <?php if($jam_mulai == '10') echo 'selected'; ?>>10</option>
                                                                <option value="11" <?php if($jam_mulai == '11') echo 'selected'; ?>>11</option>
                                                                <option value="12" <?php if($jam_mulai == '12') echo 'selected'; ?>>12</option>
                                                                <option value="13" <?php if($jam_mulai == '13') echo 'selected'; ?>>13</option>
                                                                <option value="14" <?php if($jam_mulai == '14') echo 'selected'; ?>>14</option>
                                                                <option value="15" <?php if($jam_mulai == '15') echo 'selected'; ?>>15</option>
                                                                <option value="16" <?php if($jam_mulai == '16') echo 'selected'; ?>>16</option>
                                                                <option value="17" <?php if($jam_mulai == '17') echo 'selected'; ?>>17</option>
                                                                <option value="18" <?php if($jam_mulai == '18') echo 'selected'; ?>>18</option>
                                                                <option value="19" <?php if($jam_mulai == '19') echo 'selected'; ?>>19</option>
                                                                <option value="20" <?php if($jam_mulai == '20') echo 'selected'; ?>>20</option>
                                                                <option value="21" <?php if($jam_mulai == '21') echo 'selected'; ?>>21</option>
                                                                <option value="22" <?php if($jam_mulai == '22') echo 'selected'; ?>>22</option>
                                                                <option value="23" <?php if($jam_mulai == '23') echo 'selected'; ?>>23</option>
                                                                <option value="24" <?php if($jam_mulai == '24') echo 'selected'; ?>>24</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="start_m">
                                                                <option value="00" <?php if($menit_mulai == '00') echo 'selected'; ?>>00</option>
                                                                <option value="05" <?php if($menit_mulai == '05') echo 'selected'; ?>>05</option>
                                                                <option value="10" <?php if($menit_mulai == '10') echo 'selected'; ?>>10</option>
                                                                <option value="15" <?php if($menit_mulai == '15') echo 'selected'; ?>>15</option>
                                                                <option value="20" <?php if($menit_mulai == '20') echo 'selected'; ?>>20</option>
                                                                <option value="25" <?php if($menit_mulai == '25') echo 'selected'; ?>>25</option>
                                                                <option value="30" <?php if($menit_mulai == '30') echo 'selected'; ?>>30</option>
                                                                <option value="35" <?php if($menit_mulai == '35') echo 'selected'; ?>>35</option>
                                                                <option value="40" <?php if($menit_mulai == '40') echo 'selected'; ?>>40</option>
                                                                <option value="45" <?php if($menit_mulai == '45') echo 'selected'; ?>>45</option>
                                                                <option value="50" <?php if($menit_mulai == '50') echo 'selected'; ?>>50</option>
                                                                <option value="55" <?php if($menit_mulai == '55') echo 'selected'; ?>>55</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <label for="end_h">s.d Jam</label>
                                                        <div class="row">
                                                        <div class="col-md-6">

                                                        <?php
                                                            $jam_selesai = substr($res['jam_selesai'], 0, 2);
                                                            $menit_selesai = substr($res['jam_selesai'], 3, 2);
                                                            //echo $jam_mulai . ":" .$menit_mulai;
                                                        ?>
                                                            <select class="form-control" name="end_h">
                                                                <option value="01" <?php if($jam_selesai == '01') echo 'selected'; ?>>01</option>
                                                                <option value="02" <?php if($jam_selesai == '02') echo 'selected'; ?>>02</option>
                                                                <option value="03" <?php if($jam_selesai == '03') echo 'selected'; ?>>03</option>
                                                                <option value="04" <?php if($jam_selesai == '04') echo 'selected'; ?>>04</option>
                                                                <option value="05" <?php if($jam_selesai == '05') echo 'selected'; ?>>05</option>
                                                                <option value="06" <?php if($jam_selesai == '06') echo 'selected'; ?>>06</option>
                                                                <option value="07" <?php if($jam_selesai == '07') echo 'selected'; ?>>07</option>
                                                                <option value="08" <?php if($jam_selesai == '08') echo 'selected'; ?>>08</option>
                                                                <option value="09" <?php if($jam_selesai == '09') echo 'selected'; ?>>09</option>
                                                                <option value="10" <?php if($jam_selesai == '10') echo 'selected'; ?>>10</option>
                                                                <option value="11" <?php if($jam_selesai == '11') echo 'selected'; ?>>11</option>
                                                                <option value="12" <?php if($jam_selesai == '12') echo 'selected'; ?>>12</option>
                                                                <option value="13" <?php if($jam_selesai == '13') echo 'selected'; ?>>13</option>
                                                                <option value="14" <?php if($jam_selesai == '14') echo 'selected'; ?>>14</option>
                                                                <option value="15" <?php if($jam_selesai == '15') echo 'selected'; ?>>15</option>
                                                                <option value="16" <?php if($jam_selesai == '16') echo 'selected'; ?>>16</option>
                                                                <option value="17" <?php if($jam_selesai == '17') echo 'selected'; ?>>17</option>
                                                                <option value="18" <?php if($jam_selesai == '18') echo 'selected'; ?>>18</option>
                                                                <option value="19" <?php if($jam_selesai == '19') echo 'selected'; ?>>19</option>
                                                                <option value="20" <?php if($jam_selesai == '20') echo 'selected'; ?>>20</option>
                                                                <option value="21" <?php if($jam_selesai == '21') echo 'selected'; ?>>21</option>
                                                                <option value="22" <?php if($jam_selesai == '22') echo 'selected'; ?>>22</option>
                                                                <option value="23" <?php if($jam_selesai == '23') echo 'selected'; ?>>23</option>
                                                                <option value="24" <?php if($jam_selesai == '24') echo 'selected'; ?>>24</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="end_m">
                                                                <option value="00" <?php if($menit_selesai == '00') echo 'selected'; ?>>00</option>
                                                                <option value="05" <?php if($menit_selesai == '05') echo 'selected'; ?>>05</option>
                                                                <option value="10" <?php if($menit_selesai == '10') echo 'selected'; ?>>10</option>
                                                                <option value="15" <?php if($menit_selesai == '15') echo 'selected'; ?>>15</option>
                                                                <option value="20" <?php if($menit_selesai == '20') echo 'selected'; ?>>20</option>
                                                                <option value="25" <?php if($menit_selesai == '25') echo 'selected'; ?>>25</option>
                                                                <option value="30" <?php if($menit_selesai == '30') echo 'selected'; ?>>30</option>
                                                                <option value="35" <?php if($menit_selesai == '35') echo 'selected'; ?>>35</option>
                                                                <option value="40" <?php if($menit_selesai == '40') echo 'selected'; ?>>40</option>
                                                                <option value="45" <?php if($menit_selesai == '45') echo 'selected'; ?>>45</option>
                                                                <option value="50" <?php if($menit_selesai == '50') echo 'selected'; ?>>50</option>
                                                                <option value="55" <?php if($menit_selesai == '55') echo 'selected'; ?>>55</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="pekerjaan" class="d-block">Pekerjaan</label>
                                                    <textarea name="pekerjaan" class="form-control" rows="3"><?= $res['isi_aktivitas']?></textarea>
                                                    </div>
                                                    <input type="hidden" name="lat" id="lat" value="">
                                                    <input type="hidden" name="long" id="long" value="">

                                                </form>
                                        </div>
                                        <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-primary" onclick="$('#formadd<?= $res['aktivitas_id']; ?>').submit()">Simpan</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- End modal -->
                                <?php

                                $urutan++;
                                
                            }

                            echo "</td>";
                            
                        }else {
                          echo "<td class='table-danger'>-</td>";
                          
                        }
                        // //echo '</td>';
                        
                ?>

                <td>
                    <a href="#" data-toggle="modal" data-target="#pilihTujuan<?= $no; ?>">
                        <button class='btn btn-sm btn-primary'>Tambah Aktivitas</button>
                    </a>
                    <!-- Modal -->
                    <div class="modal fade" id="pilihTujuan<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Aktivitas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form class="" action="<?php echo site_url('aktivitas/add_aktivitas/').$tgl_now. '/' . $bulan. '/' . $data->nim; ?>" method="post" id="formadd<?= $no; ?>">
                                    <div class="form-row">
                                    	 <input type="hidden" name="nim" value="<?= $data->nim ?>">
                                    <div class="form-group col-md-5">
                                        <label for="start_h">Mulai</label>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <select class="form-control" name="start_h">
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control" name="start_m">
                                            <option value="00">00</option>
                                            <option value="05">05</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="25">25</option>
                                            <option value="30">30</option>
                                            <option value="35">35</option>
                                            <option value="40">40</option>
                                            <option value="45">45</option>
                                            <option value="50">50</option>
                                            <option value="55">55</option>
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="end_h">s.d Jam</label>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <select class="form-control" name="end_h">
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control" name="end_m">
                                            <option value="00">00</option>
                                            <option value="05">05</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="25">25</option>
                                            <option value="30">30</option>
                                            <option value="35">35</option>
                                            <option value="40">40</option>
                                            <option value="45">45</option>
                                            <option value="50">50</option>
                                            <option value="55">55</option>
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label for="pekerjaan" class="d-block">Pekerjaan</label>
                                    <textarea name="pekerjaan" class="form-control" rows="3"></textarea>
                                    </div>
                                    <input type="hidden" name="lat" id="lat" value="">
                                    <input type="hidden" name="long" id="long" value="">
                                </form>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary" onclick="$('#formadd<?= $no; ?>').submit()">Simpan</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </td>

              </tr>

            <?php $no++; endfor; ?>
            </tbody>
          </table>
        </div>
    </div>
	</div>
</section>
