<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/logo_kemenag.png"/>

    <style type="text/css">
        html {
    font-size: 1rem;
    font-family: "Times New Roman", Times, serif;
    }
    </style>

    <title>Data Izin Mahasiswa - <?= $mahasiswa->nama?></title>
  </head>
  <body>

<div class="container"> 
    <div class="row mt-3 justify-content-center">
        <div class="col-md-12">
            <b><h2 class="text-center">DATA IZIN <?= $mahasiswa->nama?></h2></b>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
        <table class="table table-borderless table-sm">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nama</td>
                    <td><?= ": " .  $mahasiswa->nama?></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td><?= ": " .  $mahasiswa->nim?></td>
                </tr>
                 <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td><?= ": " .  $mahasiswa->tempat_lahir?> <?= " , " ?><?= $mahasiswa->tanggal_lahir?></td>
                </tr>
                 <tr>
                    <td>Jenis Kelamin</td>
                    <td><?= ": " .  $mahasiswa->jenis_kelamin?></td>
                </tr>
                <tr>
                    <td>Perguruan Tinggi</td>
                    <td><?= ": " .  $mahasiswa->perguruan_tinggi?></td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td><?= ": " .  $mahasiswa->jurusan?></td>
                </tr>
                <tr>
                    <td>Nomor Telepon</td>
                    <td><?= ": " .  $mahasiswa->telepon?></td>
                </tr>
                <tr>
                    <td>Tahun Masuk</td>
                    <td><?= ": " .  $mahasiswa->tahun?></td>
                </tr>
                <tr>
                    <td>Batch Masuk</td>
                    <td><?= ": " .  $mahasiswa->batch?></td>
                </tr>
                <tr>
                    <td>Divre</td>
                    <td><?= ": " .  $mahasiswa->divre?></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
      <div class="row mt-3">
        <div class="col-md-12">
          <div class="table-responsive">
          <table class="table table-hover table-sm table-striped table-bordered" id="mytable">
            <thead class="thead-light">
              <tr>
                <th>Jenis Izin</th>
                <th>Waktu</th>
                <th>Keterangan</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                        foreach ($data as $data) {
                            $cek = $this->db->query("select min(tanggal) as mulai,max(tanggal) as akhir from detailizin where izin_id = '$data->izin_id' ")->row();
                ?>
                <tr>
                    <td><?= ucfirst($data->jenis_cuti) ?></td>
                    <td><?= date('d/m/Y', strtotime($cek->mulai)) ?> - <?= date('d/m/Y', strtotime($cek->akhir)) ?></td>
                                <td>
                    <td><?= ucfirst($data->status) ?></td>
                </tr>
                <?php
                }
                ?>                
            </tbody>
          </table>
        </div>
        </div>
    </div>
      <div class="row mt-3" >
        <div class="col-md-2">
        </div>
        <div class="col-md-10">
            <table class="table table-borderless table-sm">
                <thead>
                    <tr>
                        <th scope="col" width="60%"></th>
                        <th scope="col" width="40%"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>Jakarta, <?= date('d-m-Y')?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>DIVISI SDM</td>
                    </tr>
                    <tr>
                        <td height="60px"></td>
                        <td height="60px"></td>
                    </tr>
                </tbody>
                </table>
        </div>
    </div>

</div>

<script>
    window.print();
</script>
