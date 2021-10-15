<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?= $judul; ?></h3>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="x_panel">

                        <div class="x_title">
                        </div>
                       
<div class="col-md-12">
    <?php echo form_open() ?>
    <div class="row">
        <div class="errors">
            <?php
   
            $errors = $this->session->flashdata('errors');
            if (isset($errors)) {
                foreach ($errors as $error) {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php echo $error; ?>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
            <div class="">        
            <div class=" col-xs-12">
            <label for="norm" class="col-xs-12">&nbsp;</label><br />
            <button type="button" class="btn btn-round btn-danger btn-lg btn-block" data-toggle="modal" data-target="#modal-item" title="Cari Penduduk"><i class="fa fa-search"></i> Cari Penduduk</button></small>
        </div>
        </div>
            <div class="form-row ">
            <div class=" form-group ">
            <label for="status" style="font-weight: bold;">Nomor Kartu keluarga</label>
            <input name="no_kk" type="text" class="form-control" id="no_kk"
                                value="<?php echo isset($nilaiPenduduk[0]->no_kk) ? $nilaiPenduduk[0]->no_kk : ''?>"
                               placeholder="Nomot KK" readonly>
            <input type="hidden" class="form-control" id="id" name="id_penduduk" value="" readonly>
            </div>
        </div>
            <div class="form-row ">
            <div class=" form-group ">
            <label for="status" style="font-weight: bold;">Nama Penduduk</label>
            <input name="penduduk" type="text" class="form-control" id="nama"
                                value="<?php echo isset($nilaiPenduduk[0]->penduduk) ? $nilaiPenduduk[0]->penduduk : ''?>"
                               placeholder="Nama Penduduk" readonly>
          
            </div>
        </div>
            <div class="form-row ">
            <div class=" form-group ">
            <label for="status" style="font-weight: bold;">Nomor Nik Penduduk</label>
            <input name="nik" type="text" class="form-control" id="nik"
                                value="<?php echo isset($nilaiPenduduk[0]->nik) ? $nilaiPenduduk[0]->nik : ''?>"
                               placeholder="Nomor Nik Penduduk" readonly>
            
            </div>
        </div>
<!-- 
<?php
                foreach ($dataView as $item) {
                    ?> 
                      <?php
                       foreach ($item['data'] as $dataItem) {
                        ?>
                   <?php
                    }
                }
                    ?>
          -->

        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <!-- <th colspan="1" class="col-md-3">Isi Data Dengan Jujur Dan Benar!!</th> -->
                <div class="text-center">
                    <legend>

                        <h4>Isi Semua Data Dengan Benar dan Jujur !!!</h4>
                    </legend>
                </div>
                    
                </tr>
                <?php
                foreach ($dataView as $item) {
                ?>
                <tr>
                    <td><?php echo $item['nama']; ?></td>
                    <td>
                         <div class="form-group">
                    
                        <select name="nilai[<?php echo $dataItem->kd_kriteria ?>]" id="daerah" class="form-control">
                            <option value="" >--Pilih <?php echo $item['nama']; ?>--</option>
                            <?php foreach ($item['data'] as $dataItem) : ?>
                            <option  value="<?php echo $dataItem->value ?>"
                            
                             ><?php echo $dataItem->subKriteria;?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    </td>
                    <?php
                    
                    echo '</tr>';
                    }
                    ?>
            </table>
        </div>
        <div class="pull-right" style="margin-bottom:20px;">
            <div class="col-md-12" style="margin-top:-15px;">
                <button class="btn btn-round btn-primary" type="submit">Save</button>
                <a class="btn  btn-round btn-warning" href="<?php site_url('sd') ?>" role="button">Batal</a>

            </div>
        </div>
    </div>
    <?php echo form_close() ?>
</div>
            <!-- Modal Tambah -->
    <div class="modal fade" id="modal-item" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pencarian Penduduk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table id="table_f_pendaftaran" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nomor KK</th>
                            <th>Nama KK</th>
                            <th>Nomor NIK</th>
                            <th>Alamat</th>
                            <th>No Telephon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($penduduk as $rm) : ?>
                            <tr>
                                <td><?= $rm['no_kk']; ?></td>
                                <td><?= $rm['nama']; ?></td>
                                <td><?= $rm['nik']; ?></td>
                                <td><?= $rm['alamat']; ?></td>
                                <td><?= $rm['nohp']; ?></td>

                                <td>
                                    <button class="btn btn-round btn-block  btn-warning " id="select" data-id="<?php echo $rm['id'] ?>" data-no_kk="<?php echo $rm['no_kk'] ?>" data-nama="<?php echo $rm['nama'] ?>" data-nik="<?php echo $rm['nik'] ?>" data-alamat="<?php echo $rm['alamat'] ?>" data-nohp="<?php echo $rm['nohp'] ?>">
                                        <i class="fa fa-check"></i> Select
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Modal F_Pendaftaran -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table_f_pendaftaran').DataTable();
    });
</script>

<!-- Script Hal Kunjungan Ulang -->
<script>
  $(document).ready(function() {
    $(document).on('click', '#select', function() {
      var id = $(this).data('id');
      var no_kk = $(this).data('no_kk');
      var nama = $(this).data('nama');
      var nik = $(this).data('nik');
      var alamat = $(this).data('alamat');
      $('#id').val(id);
      $('#no_kk').val(no_kk);
      $('#nama').val(nama);
      $('#nik').val(nik);
      $('#alamat').val(alamat);
    $('#modal-item').modal('hide');
     
    });
  });
</script>


