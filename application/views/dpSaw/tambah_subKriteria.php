<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class=" text-center">
                <h3><?= $judul; ?></h3>
            </div>

            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="x_panel">
                            <?= form_open_multipart('dpSaw/subkriteria'); ?>
                        
                            <div class="form-group col-md-12">
                            
                                <div class=" col-xs-12">
                                    <label for="norm" class="col-xs-12">&nbsp;</label><br />
                                    <button type="button" class="btn btn-round btn-warning btn-lg btn-block" data-toggle="modal" data-target="#modal-item" title="Cari Kriteria"><i class="fa fa-search"></i> Cari Kriteria</button></small>
                                </div>
                            </div>
                            <div class="form-row col-md-12">
                                <div class=" form-group col-md-12">
                                    <label for="status" style="font-weight: bold;">Nama Kriteria</label>
                                    <input type="text" class="form-control" id="kriteria" name="kriteria" placeholder="Masukan Nama Kriteria" readonly>
                                    <input type="hidden" class="form-control" id="kd_kriteria" name="kd_kriteria" value="" readonly>
                                </div>
                            </div>
                            <div class="form-row col-md-12">
                                <div class=" form-group col-md-12">
                                    <label for="status" style="font-weight: bold;">Nama Sub Kriteria</label>
                                    <input type="text" class="form-control" id="subKriteria" name="subKriteria" placeholder="Masukan Nama Sub Kriteria" required>
                                </div>
                            </div>
                            <div class="form-row col-md-12">
                                <div class=" form-group col-md-12">
                                    <label for="status" style="font-weight: bold;">Value Sub Kriteria</label>
                                    <input type="text" class="form-control" id="value" name="value" placeholder="Masukan Nilai Sub Kriteria" required>
                                </div>
                            </div>
                        
                            
                            <div class=" text-right form-group row col-md-12">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-round btn-primary"><i class="fa fa-paper-plane"></i> Simpan</button>
                                    <a href="<?= site_url('dpSaw/subkriteria') ?>" class="btn btn-round btn-info btn-flat">
                                        <i class="fa fa-undo"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </form>   
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- modal -->

    <!-- Modal Tambah -->
    <div class="modal fade" id="modal-item" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pencarian Kriteria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">

                <table id="table_f_pendaftaran" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>

                            <th>No</>
                            <th>Nama Kriteria</>
                            <th>Sifat</th>
                            <th>Bobot</th>
                            
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                          <?php $i = 1; ?>
                        <?php foreach ($kriteria as $rm) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $rm['kriteria']; ?></td>
                                <td><?= $rm['sifat']; ?></td>
                                <td><?= $rm['bobot']; ?></td>
                                
                                <td>
                                    <button class="btn btn-round btn-block  btn-success " id="select" data-kd_kriteria="<?php echo $rm['kd_kriteria'] ?>" data-kriteria="<?php echo $rm['kriteria'] ?>" data-sifat="<?php echo $rm['sifat'] ?>" data-bobot="<?php echo $rm['bobot'] ?>" >
                                        <i class="fa fa-check"></i> Select
                                    </button>
                                </td>
                            </tr>
                             <?php $i++; ?>
                                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Modal F_Pendaftaran -->
<script type="" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table_f_pendaftaran').DataTable();
    });
</script>

<!-- Script Hal Kunjungan Ulang -->
<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '#select', function() {
      var kd_kriteria = $(this).data('kd_kriteria');
      var kriteria = $(this).data('kriteria');
      var sifat = $(this).data('sifat');
      var bobot = $(this).data('bobot');
      $('#kd_kriteria').val(kd_kriteria);
      $('#kriteria').val(kriteria);
      $('#sifat').val(sifat);
      $('#bobot').val(bobot);
    $('#modal-item').modal('hide');
     
    });
  });
</script>
