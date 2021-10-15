<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?= $judul; ?></h3>
            </div>

            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="x_panel">

                        <div class="x_title">
                            <a href="<?= base_url('dpSaw/tambah_c') ?>" class="btn btn-round btn-primary mb-3" > Tambah Data</a>
                          
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">

                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Sub Kriteria</th>
                                        <th>Kode Kriteria</th>
                                        <th>Nama Kriteria</th>
                                        <th>Value</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($subkriteria as $k) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $k['subKriteria']; ?></td>
                                            <td><?= $k['kd_kriteria']; ?></td>
                                            <td><?= $k['kriteria']; ?></td>
                                            <td><?= $k['value']; ?></td>
                                            <td>
                                                <a href="<?= base_url('dpSaw/edit_c') ?>" class="label btn-round btn-success" data-toggle="modal" data-target="#modalEditsubKriteria<?= $k['kdSubKriteria']; ?>">edit</a>
                                                <!-- <a href="<?= base_url('DpSaw/edit_c/') . $k['kdSubKriteria']; ?>" class="label btn-round btn-warning" >Edit</a> -->
                                                <a href="<?= base_url('DpSaw/hapussubKriteria/') . $k['kdSubKriteria']; ?>" class="label btn-round btn-danger" onclick="return confirm ('Yakin?');">hapus</a>
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
        </div>
    </div>
    <!-- /page content -->

    <!-- modal -->

     <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambahsubKriteria" tabindex="-1" role="dialog" aria-labelledby="modalTambahsubKriteriaLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="modalTambahsubKriteria">Tambah Sub Kriteria</h5>
                </div>
                <?= form_open_multipart('dpSaw/subKriteria'); ?>
                <div class="modal-body">

                 <div class="col">
                <label for="norm" class="col-xs-12">&nbsp;</label><br />
                <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#modal-item" title="Cari Kriteria"><i class="fa fa-search"></i> Cari Kriteria</button></small>
            </div>
                    
                    <div class="form-group">
                    <label for="">Nama Kriteria</label>
                        <input type="text" class="form-control" id="kriteria" name="kriteria" placeholder="Nama  kriteria">
                        <input type="text" class="form-control" id="kd_kriteria" name="kd_kriteria" placeholder="Nama Sub kriteria">
                    </div>

                    <div class="form-group">
                    <label for="">Nama Sub Kriteria</label>
                        <input type="text" class="form-control" id="subKriteria" name="subKriteria" placeholder="Nama Sub kriteria">
                    </div>
                    <div class="form-group">
                    <label for="">Nilai Sub Kriteria</label>
                        <input type="text" class="form-control" id="value" name="value" placeholder="Nilai Sub kriteria">
                    </div>
                  

                    <div class="modal-footer">
                        <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-round btn-primary">Tambah</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div> 

    <!-- Modal Edit -->
   <?php foreach ($subkriteria as $k) : ?>
        <div class="modal fade" id="modalEditsubKriteria<?= $k['kdSubKriteria']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditsubKriteriaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="modalEditKriteria">Edit Sub Kriteria</h5>
                    </div>
                    <?= form_open_multipart('dpSaw/editsubKriteria'); ?>
                    <input type="hidden" name="kdSubKriteria" value="<?= $k['kdSubKriteria']; ?>">
                    <input type="hidden" name="kd_kriteria" value="<?= $k['kd_kriteria']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                        <label for="">Nama Kriteria</label>
                            <input type="text" class="form-control" id="kriteria" name="kriteria" placeholder="Nama Sub kriteria" value="<?= $k['kriteria']; ?>" readonly>
                        </div>
                        <div class="form-group">
                        <label for="">Nama sub Kriteria</label>
                            <input type="text" class="form-control" id="subKriteria" name="subKriteria" placeholder="Nama Sub kriteria" value="<?= $k['subKriteria']; ?>" required>
                        </div>
                        <div class="form-group">
                        <label for="">Nilai Kriteria</label>
                            <input type="text" class="form-control" id="value" name="value" placeholder="Bobot kriteria" value="<?= $k['value']; ?>" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-round btn-primary">Edit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
 

