<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><?= $judul; ?></h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="x_panel">

                        <div class="x_title">
                            <a href="" class="btn btn-round btn-primary mb-3" data-toggle="modal" data-target="#modalTambahPenduduk"> Tambah Penduduk</a>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">

                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor KK </th>
                                        <th>Nama</th>
                                        <th>Nik</th>
                                        <th>Alamat</th>
                                        <th>Telephon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($penduduk as $k) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $k['no_kk']; ?></td>
                                            <td><?= $k['nama']; ?></td>
                                            <td><?= $k['nik']; ?></td>
                                            <td><?= $k['alamat']; ?></td>
                                            <td><?= $k['nohp']; ?></td>
                                           
                                            <td>
                                                <a href="" class="label btn-round btn-success" data-toggle="modal" data-target="#modalEditPenduduk<?= $k['id']; ?>">edit</a>
                                                <a href="<?= base_url('DpSaw/hapusPenduduk/') . $k['id']; ?>" class="label btn-round btn-danger" onclick="return confirm ('Yakin?');">hapus</a>
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

 <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambahPenduduk" tabindex="-1" role="dialog" aria-labelledby="modalTambahPendudukLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="modalTambahPenduduk">Tambah Penduduk</h5>
                </div>
                <?= form_open_multipart('dpSaw/data_penduduk'); ?>
                <div class="modal-body">
                    
                    <div class="form-group">
                    <label for="">Nomor Kartu Keluarga</label>
                        <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="Nomor KK" required>
                    </div>
                    <div class="form-group">
                    <label for="">Nama Penduduk</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Penduduk" required>
                    </div>
                    <div class="form-group">
                    <label for="">Nik</label>
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="Nik Penduduk" required>
                    </div>
                    <div class="form-group">
                    <label for="">Alamat Penduduk</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Penduduk" required>
                    </div>
                    <div class="form-group">
                    <label for="">No Hp</label>
                        <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Nomor Handphone" required>
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
    <?php foreach ($penduduk as $k) : ?>
        <div class="modal fade" id="modalEditPenduduk<?= $k['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditPendudukLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="modalEditKriteria">Edit Data</h5>
                    </div>
                    <?= form_open_multipart('dpSaw/editPenduduk'); ?>
                    <input type="hidden" name="id" value="<?= $k['id']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="Nomor KK Penduduk" value="<?= $k['no_kk']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Penduduk" value="<?= $k['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nik" name="nik" placeholder="Nik Penduduk" value="<?= $k['nik']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Penduduk" value="<?= $k['alamat']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nohp" name="nohp" placeholder="No Handphone Penduduk" value="<?= $k['nohp']; ?>">
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
