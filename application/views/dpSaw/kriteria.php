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
                            <a href="" class="btn btn-round btn-primary mb-3" data-toggle="modal" data-target="#modalTambahKriteria"> Tambah Data</a>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">

                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kriteria</th>
                                        <th>Kode Kriteria</th>
                                        <th>Sifat</th>
                                        <th>Bobot</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <?php $i = 1; ?> -->
                                    <?php foreach ($kriteria as $k) : ?>

                                        <?php
                                        if ($k['sifat'] == 'B') {
                                            $k['sifat'] = 'Benefit';
                                        } else if ($k['sifat'] == 'C') {
                                            $k['sifat'] = 'Cost';
                                        }
                                        ?>

                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $k['kriteria']; ?></td>
                                            <td><?= $k['kode_kriteria']; ?></td>
                                            <td><?= $k['sifat']; ?></td>
                                            <td><?= $k['bobot']; ?></td>
                                            <td>
                                                <a href="" class="label btn-round btn-success" data-toggle="modal" data-target="#modalEditKriteria<?= $k['kd_kriteria']; ?>">edit</a>
                                                <a href="<?= base_url('DpSaw/hapusKriteria/') . $k['kd_kriteria']; ?>" class="label btn-round btn-danger" onclick="return confirm ('Yakin?');">hapus</a>
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
    <div class="modal fade" id="modalTambahKriteria" tabindex="-1" role="dialog" aria-labelledby="modalTambahKriteriaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="modalTambahKriteria">Tambah Kriteria</h5>
                </div>
                <?= form_open_multipart('dpSaw/kriteria'); ?>
                <div class="modal-body">
                    <div class="form-group">
                    <label for="">Nama Kriteria</label>
                        <input type="text" class="form-control" id="kriteria" name="kriteria" placeholder="Nama kriteria">
                    </div>
                    <div class="form-group">
                    <label for="">Kode Kriteria</label>
                        <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria" placeholder="Kode kriteria">
                    </div>
                    <div class="form-group">
                    <label for="">Sifat Kriteria</label>
                        <select name="sifat" id="sifat" class="form-control">
                            
                                <?php
                                if ($r['sifat'] == 'B') {
                                    $r['sifat'] = 'Benefit';
                                } else {
                                    $r['sifat'] = 'Cost';
                                }
                                ?>
                                <option value="">-- Pilih Sifat Kriteria --</option>
                                <option value="B">Benefit</option>
                                <option value="C">Cost</option>
                        </select>
                    </div>
                 
                    <div class="form-group">
                        <input type="text" class="form-control" id="bobot" name="bobot" placeholder="Bobot kriteria" required>
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
    <?php foreach ($kriteria as $k) : ?>
        <div class="modal fade" id="modalEditKriteria<?= $k['kd_kriteria']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditKriteriaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="modalEditKriteria">Edit Kriteria</h5>
                    </div>
                    <?= form_open_multipart('dpSaw/editKriteria'); ?>
                    <input type="hidden" name="kd_kriteria" value="<?= $k['kd_kriteria']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                        <label for="">Nama Kriteria</label>
                            <input type="text" class="form-control" id="kriteria" name="kriteria" placeholder="Kode kriteria" value="<?= $k['kriteria']; ?>">
                        </div>
                        <div class="form-group">
                        <label for="">Kode Kriteria</label>
                            <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria" placeholder="Kode kriteria" value="<?= $k['kode_kriteria']; ?>">
                        </div>
                        <div class="form-group">
                        <label for="">Sifat Kriteria</label>
                            <select class="form-control" name="sifat" id="sifat">
                                <option value="<?= $k['sifat']; ?>">sifat =
                                    <?php
                                    if ($k['sifat'] == 'B') {
                                        $k['sifat'] = 'Benefit';
                                    } elseif ($k['sifat'] == 'C') {
                                        $k['sifat'] = 'Cost';
                                    }
                                    ?>
                                    <?= $k['sifat']; ?>
                                </option>
                                <option value="B">Benefit</option>
                                <option value="C">Cost</option>
                            </select>
                        </div>

                        <div class="form-group">
                        <label for="">Bobot Kriteria</label>
                            <input type="text" class="form-control" id="bobot" name="bobot" placeholder="Bobot kriteria" value="<?= $k['bobot']; ?>" required>
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