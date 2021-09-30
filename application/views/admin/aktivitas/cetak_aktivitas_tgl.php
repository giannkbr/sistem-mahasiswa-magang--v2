<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">
    

    <style type="text/css">
        html {
    font-size: 1.2rem;
    font-family: "Times New Roman", Times, serif;
    }
    </style>

    <title>Rekap Aktivitas</title>
  </head>
  <body>

<div class="container"> 
    <div class="row mt-3 justify-content-center">
        <div class="col-md-12">
            <b><h2 class="text-center">LAPORAN AKTIVITAS HARIAN</h2></b>
        </div>
    </div>
    <hr>
    <div class="row mt-3"> Saya yang bertanda tangan di bawah ini : </div>
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
                    <td><?php echo ": " .  $data->nama?></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td><?= ": " .  $data->nim?></td>
                </tr>
                <tr>
                    <td>Divre</td>
                    <td><?= ": " .  $data->divre?></td>
                </tr>
                   <tr>
                    <td>Bagian Unit</td>
                    <td><?= ": " .  $data->bagian_unit?></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    <div class="row mt-3"> Sesuai uraian tugas dan fungsi saya telah melaksanakan tugas sebagai berikut:</div>
    <div class="row mt-3">
        <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-hover table-sm table-striped table-bordered" id="mytable">
            <thead class="thead-light">
              <tr>
                <th scope="col" width="3%">No</th>
                <th scope="col" width="12%">Tanggal</th>
                <th scope="col" width="85%">Aktivitas Harian</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              
              //$tgl = date('d');
            
                //if ($bln_awal == $bln_akhir){
                    //for ($tgl_awal; $tgl_awal <= $tgl_akhir; $tgl_awal++):
                        //echo '<td>';
                        // if ($i<=9){
                        //     $tgl_select = '0'.$i;
                        // }else {
                        //     $tgl_select = $i;
                        // }
        
                        //tgl_now = date('Y') ."-". $bln_awal . "-". $tgl_awal;
                        //$thn_bln = date('Y') ."-". $bln_awal;
                    ?>
                      <!--<tr>
                        
                       <td>
                           
                        </td>
                        -->
                        <?php
                                $sql = "SELECT  * FROM `aktivitas` WHERE `nim` = '". $data->nim ."' && tgl_aktivitas BETWEEN  '". $tgl_awal ."' AND '". $tgl_akhir ."' ORDER BY `tgl_aktivitas` ASC";
                                $result = $this->db->query($sql)->result_array();
                                if ($result){
                                    
                                    $urutan = 1;
                                    $tgl_sebelumnya = 0;
                                    $no = 1;
                                    foreach($result as $res){
                                        echo "<tr>";
                                        if ($res['tgl_aktivitas'] == $tgl_sebelumnya){
                                            echo "<td> </td>";
                                            echo "<td> </td>";
                                        }else {
                                            echo "<td> ". $no ." </td>";
                                            echo "<td> ". $res['tgl_aktivitas'] ." </td>";
                                            $no++;
                                        }
                                        echo '<td>';
                                        echo substr($res['jam_mulai'],0,5)."-". substr($res['jam_selesai'],0,5). " ";
                                        echo "<i>". $res['isi_aktivitas'] . "</i> </br>";
                                        echo "</td>";
                                        $urutan++;
                                        
                                        $tgl_sebelumnya = $res['tgl_aktivitas'];
                                        echo "</tr>";
                                    }
        
                                    
                                    
                                }else {
                                  echo "<td class='table-danger'>-</td>";
                                  
                                }
                                // //echo '</td>';
                                
                        ?>
                     <!-- </tr>-->

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
