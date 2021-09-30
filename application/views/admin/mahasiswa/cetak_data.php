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

    <title>Data Mahasiswa - <?= $data->nama?></title>
  </head>
  <body>

<div class="container"> 
    <div class="row mt-3 justify-content-center">
        <div class="col-md-12">
            <b><h2 class="text-center">DATA <?= $data->nama?></h2></b>
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
                    <td><?= ": " .  $data->nama?></td>
                </tr>
                <tr style="position:absolute; top:0; right:0">
                    <td><img width="150px" src="<?= base_url('images/users/' .  $data->photo) ?>" alt="" srcset=""></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td><?= ": " .  $data->nim?></td>
                </tr>
                 <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td><?= ": " .  $data->tempat_lahir?> <?= " , " ?><?= $data->tanggal_lahir?></td>
                </tr>
                 <tr>
                    <td>Jenis Kelamin</td>
                    <td><?= ": " .  $data->jenis_kelamin?></td>
                </tr>
                <tr>
                    <td>Perguruan Tinggi</td>
                    <td><?= ": " .  $data->perguruan_tinggi?></td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td><?= ": " .  $data->jurusan?></td>
                </tr>
                <tr>
                    <td>Nomor Telepon</td>
                    <td><?= ": " .  $data->telepon?></td>
                </tr>
                <tr>
                    <td>Tahun Masuk</td>
                    <td><?= ": " .  $data->tahun?></td>
                </tr>
                <tr>
                    <td>Batch Masuk</td>
                    <td><?= ": " .  $data->batch?></td>
                </tr>
                <tr>
                    <td>Divre</td>
                    <td><?= ": " .  $data->divre?></td>
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
                <th>Pemahaman Tentang Peran Mahasiswa Magang Dan Penyesuaian Diri</th>
                <th>Pemahaman Terhadap Bidang Usaha Dan Proses Bisnis Perusahaan</th>
                <th>Keberhasilan Pencapaian Learning Objectives Sesuai Learning Plan Yang Sudah Ditentukan</th>
                <th>Keluasan Wawasan Keilmuan Dan Penerapannya</th>
                <th>Kemampuan Merumuskan Permasalahan Dan Rencana Pemecehan</th>
                <th>Kemampuan Mencapai Target Pekerjaan</th>
                 <th>Total Nilai Keseluruhan</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                 <?php
                 if($nilai === NULL){
                    echo "
                    <td> 0 </td>
                    <td> 0 </td>
                    <td> 0 </td>
                    <td> 0 </td>
                    <td> 0 </td>
                    <td> 0 </td>
                     <td> 0 </td>
                    ";
                 }else{
                    echo "
                    <td><?= $nilai->nilai_a ?></td>
                    <td>$nilai->nilai_b</td>
                    <td>$nilai->nilai_c</td>
                    <td>$nilai->nilai_d</td>
                    <td>$nilai->nilai_e</td>
                     <td>$nilai->nilai_f</td>
                      <td>$nilai->total</td>
                    ";
                 }
                 ?>
                </tr>

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
