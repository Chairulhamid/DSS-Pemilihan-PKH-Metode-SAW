<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Cetak <?= $judul; ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&family=Open+Sans&display=swap" rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

  <div class="container">
    <center class="my-5 text-dark">
      <div class="row justify-content-center">
        <div  class=" mb-3 mr-4">
          <img style="position:absolute;margin-left:-350px;margin-top:15px;" src="<?= base_url('images/kabAgam.png') ?>" alt="kab Agam" width="80">
        </div>
        <div class="col-lg-10  ">
          
          <h4 style="margin-top: -10px;" class="border-bottom-dark">Pemerintahan Kabupaten Agam </h4>
          <h4 style="margin-top: -10px;" class="border-bottom-dark">Kecematan Banuhampu </h4>
          <h4 style="margin-top: -10px;" class="border-bottom-dark">Nagari Padang Lua </h4>
          <small>Alamat: Jl. Raya Padang Panjang - Bukittinggi No.Km.5, Padang Lua,</small><br>
          <small>Kec. Banuhampu, Kabupaten Agam, Sumatera Barat 26181.</small><br>
          <small>Telepon: (0752) 77889900.</small><hr>
          <h5 style="margin-top: -10px;">Laporan Calon Penerima PKH</h5>
        </div>
      </div>
    </center>
  </div>
    

    <div class="card shadow mb-4">
   
      <div class="card-body">
        <div class="table">
          <table class="display nowrap dataTable dtr-inline table table-bordered table-striped text-center" cellspacing="0">
              <thead>
                            <tr class="active">
                            <th class="col-md-1 text-center">No</th>
                            <th class="text-center">Nomor Kartu keluarga</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Rangking</th>
                            </tr>
                                </thead>
                                    <tbody>
                                <?php
                        $table = $this->page->getData('tableFinal');
                        $table1 = $this->page->getData('tableFinal1');
                        $no = 1;
                          foreach ($table as $item => $value) {
                              if ($value->Rangking <= $table1) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $no ?></td>
                                <td class="text-center"><?php echo $value->Nomor_kk ?></td>
                                <td class="text-center"><?php echo $value->Total ?></td>
                                <td class="text-center"><?php echo $value->Rangking ?></td>

                            </tr>
                            <?php
                            $no++;
                        }
                    }
                        ?>
                </tbody>
          </table>
          <div class="mt-5" >

              <div style="margin-right:50px;"  align="right"><strong> Padang Lua, <?= date('m/d/Y'); ?></strong>
              <div style="margin-right:45px;" align="right"><b> Wali Nagari </b> <br>
              <br></br>
              <br></br>
             
              <div style="margin-right:10px;" align="right"><strong>(Edison ) </strong><br/>
              </div>
          </div>
        </div>
      </div>
    </div>
  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



  <script>
    window.print();
  </script>
</body>

</html>
