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
                           <a href="<?= base_url('dpsaw/printPenduduk') ?>" class="btn btn-round btn-primary mb-3" target="_blank">Cetak</a>
                            <div class="clearfix"></div>
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

 