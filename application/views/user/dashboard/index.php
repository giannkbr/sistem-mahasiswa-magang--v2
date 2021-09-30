<section class="content">
      <div class="container-fluid">
      	<div class="row">
      		<div class="col-lg-12">
      			<div class="card">
      				<div class="card-header">
      					<h5>Hi, <?= $this->session->userdata('nama'); ?></h5>
      				</div>
      			</div>
      		</div>
      	</div>
      	<div class="row">
      		<div class="col-lg-12">
	      		<div class="card">
	      			<div class="card-body">
	      			 <a id="absen_link" href="<?php echo site_url('user/absen/add_absen');?>">
	                <button  id="checkout-button" type="button" class="btn btn-primary btn-block">Absen</button>
	            </a>
                <div class="row mt-2">
                    <div class="col-sm-12">
                          <select class="form-control" name="keterangan_kerja">
                          <option>Pilih Keterangan Bekerja</option>
                          <option name="wfh">WFH</option>
                          <option name="wfo">WFO</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mt-3 mb-3">
                            <div id='maps-absen' name="maps-absen" style='width: 100%; height:250px;'></div>
                            <input type="hidden" name="location_maps" id="location_maps_hidden" />
                            <script type="text/javascript">
                                setInterval(function() {
                                    document.getElementById("location_maps_hidden").value = document.getElementById("location_maps").innerHTML;
                                }, 5);
                            </script>
                            <?= form_error('maps-absen', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
                        </div>
                </div>
	            <div class="row mt-2">
	                <div class="col-lg-6">
	                        <h6>Absen Masuk :</h6>    
	                </div>
	                <hr>
	                <div class="col-lg-6">
	                        <h6>
	                          <?php 
	                              if(!isset($absen['waktu_masuk']))
	                              {
	                                echo '-';
	                              } else {
	                                echo $absen['waktu_masuk'];
	                              }
	                            ?>
	                        </h6>  
	                </div>
	            </div>
	            <div class="row justify-content-center">
	                <div class="col-lg-6">
	                        <h6>Absen Pulang :</h6>  
	                </div>
	                <div class="col-lg-6">
	                        <h6><?php
	                            if (!isset($absen)){
	                                echo '-';
	                            } else {
	                              if($absen['waktu_keluar'] == '00:00:00')
	                              {
	                                echo '-';
	                              } else {
	                                echo $absen['waktu_keluar'];
	                              }
	                            }
	                           ?>
	                        </h6>  
	                </div>
	            </div>
	            <div class="badge badge-info text-wrap">
	                Jam Absen Masuk: 07.00 s.d 09.00
	            </div>
	             <div class="badge badge-info text-wrap">
	                Jam Absen Pulang: 15.00 s.d 17.00
	            </div>
	      		</div>
      		</div>
      	</div>
      </div>
      <div class="row">
      		<div class="col-lg-12">
      			<div class="card">
      				<div class="card-header">
      					Data Aktivitas Harian
      				</div>

	      			<div class="card-body">
	      				 <div class="col-md-12">
	      				 	<button id="inputaktivitas" type="button" class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#addaktivitas">Input Aktivitas</button>
	      				 </div>
	      				 <div class="table-responsive">
          <table class="table table-hover" id="example1">
            <thead class="thead-light">
              <tr>
                <th>Tanggal Input</th>
                <th>Jam</th>
                <th>Aktivitas</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($data as $aktivitas):?>
              <tr>
                <th scope="row"><?= $aktivitas['tgl_aktivitas']?></th>
                <td><?= substr($aktivitas['jam_mulai'],0,5) . " - " . substr($aktivitas['jam_selesai'], 0, 5)  ?></td>
                <td><?= $aktivitas['isi_aktivitas']?></td>
                <td style="text-align:center">
                   	<a href="<?= base_url(); ?>user/absen/hapus_aktivitas/<?= $aktivitas['aktivitas_id']; ?>"><button class="btn btn-sm btn-danger  tombol-hapus">Hapus</button></a>
                   	<a href="" data-toggle='modal' data-target='#edit<?= $aktivitas['aktivitas_id']?>' ><button class="btn btn-sm btn-info">Edit</button></a>
                      <!-- Modal -->
                      <div class="modal fade" id="edit<?= $aktivitas['aktivitas_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Aktivitas</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form class="" action="<?php echo site_url('user/absen/edit_aktivitas/').$aktivitas['aktivitas_id']."/0"; ?>" method="post" id="formadd<?= $aktivitas['aktivitas_id']; ?>">
                                                    <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="start_h">Mulai</label>
                                                        <div class="row">
                                                        <?php
                                                            $jam_mulai = substr($aktivitas['jam_mulai'], 0, 2);
                                                            $menit_mulai = substr($aktivitas['jam_mulai'], 3, 2);
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
                                                            $jam_selesai = substr($aktivitas['jam_selesai'], 0, 2);
                                                            $menit_selesai = substr($aktivitas['jam_selesai'], 3, 2);
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
                                                    <label for="aktivitas" class="d-block col-md-4">Data Aktivitas</label>
                                                    <textarea name="pekerjaan" class="form-control" rows="3"><?= $aktivitas['isi_aktivitas']?></textarea>
                                                    </div>
                                                    <input type="hidden" name="lat" id="lat" value="">
                                                    <input type="hidden" name="long" id="long" value="">
                                                </form>
                                        </div>
                                        <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-primary" onclick="$('#formadd<?= $aktivitas['aktivitas_id']; ?>').submit()">Simpan</button>
                                          </div>
                                          </div>
                                      </div>
                                    </div>
                    
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
	      			</div>
	      		</div>
      		</div>
      	</div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Modal -->
<div class="modal fade" id="addaktivitas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Aktivitas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="" action="<?= site_url('user/absen/add_aktivitas/');?>" method="post" id="formadd">
                <div class="form-row">
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
                  <label for="pekerjaan" class="d-block">Aktivitas</label>
                  <textarea name="pekerjaan" class="form-control" rows="3"></textarea>
                </div>
                <input type="hidden" name="lat" id="lat" value="">
                <input type="hidden" name="long" id="long" value="">
              </form>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary" onclick="$('#formadd').submit()">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit_aktivitas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Aktivitas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="" action="<?= site_url('user/absen/edit_aktivitas');?>" method="post" id="formadd">
                <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="start_h">Mulai</label>
                    <div class="row">
                      <div class="col-md-6">
                        <select class="form-control" name="start_h" id="start_h">
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
                        <select class="form-control" name="start_m" id="start_m">
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
                        <select class="form-control" name="end_h" id="end_h">
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
                        <select class="form-control" name="end_m" id="end_m">
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
                  <label for="pekerjaan" class="d-block">Aktivitas</label>
                  <textarea name="pekerjaan" id="pekerjaan" class="form-control" rows="3"></textarea>
                </div>
                <input type="hidden" name="lat" id="lat" value="">
                <input type="hidden" name="long" id="long" value="">
              </form>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary" onclick="$('#formadd').submit()">Simpan</button>
      </div>
    </div>
  </div>
</div>
</main>

<script>
  var x = document.getElementById("absen_link").getAttribute("href");
  console.log(x);
  var lat;
  var long;

  document.addEventListener("DOMContentLoaded", function(event) { 
      //alert('siap!');
      if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(showPosition);
      } else { 
              console.log('Browser anda tidak support Geolocation');
      }   
      
  });

    function getLocation() {
          if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(showPosition);
          } else { 
              x.innerHTML = "Geolocation is not supported by this browser.";
          }
      }

      function showPosition(position) {

          lat = position.coords.latitude;
          long = position.coords.longitude;

          if (lat){
            x = x + '/' + lat + '/' + long;

            console.log('href baru : ' + x);
            document.getElementById("absen_link").setAttribute("href" , x);

          } else {
                console.log('anda tidak mengizinkan lokasi');
          }
      }    
        document.getElementById("maps-absen")
    window.onload = function() {
        var popup = L.popup();
        var geolocationMap = L.map("maps-absen", {
            center: [40.731701, -73.993411],
            zoom: 15,
        });

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(geolocationMap);

        function geolocationErrorOccurred(geolocationSupported, popup, latLng) {
            popup.setLatLng(latLng);
            popup.setContent(
                geolocationSupported ?
                "<b>Error:</b> The Geolocation service failed." :
                "<b>Error:</b> This browser doesn't support geolocation."
            );
            popup.openOn(geolocationMap);
        }

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    var latLng = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };

                    var marker = L.marker(latLng).addTo(geolocationMap);
                    geolocationMap.setView(latLng);
                    document.getElementById("location_maps").innerHTML = position.coords.latitude + ", " + position.coords.longitude;
                },
                function() {
                    geolocationErrorOccurred(true, popup, geolocationMap.getCenter());
                }
            );
        } else {
            //No browser support geolocation service
            geolocationErrorOccurred(false, popup, geolocationMap.getCenter());
        }
    };

</script>