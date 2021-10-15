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
                         <a href="<?= base_url('pSaw/nilaiSAW') ?>" class="btn btn-round btn-primary mb-3" > Tambah Data</a>

                        <div class="x_title">
                            <!-- <a href="" class="btn btn-round btn-primary mb-3" data-toggle="modal" data-target="#modalTambahKriteria"> Tambah Data</a> -->
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">

                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Penduduk</th>
                                        <th>Nomor KK</th>
                                        <th>Nik</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <?php $i = 1; ?> -->
                                    <?php 
                                    if (isset($penduduk)) {
                            if(count($penduduk) == 0){
                                echo '<tr><td colspan="5" class="text-center"><h3>No Data Input</h3></td></tr>';
                            }
                        }
                                    foreach ($penduduk as $k) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $k['penduduk']; ?></td>
                                            <td><?= $k['no_kk']; ?></td>
                                            <td><?= $k['nik']; ?></td>
                                            <td>
                                            <a class="label btn btn-success btn-round btn-xs "
                                            href="<?php echo site_url('pSaw/nilaiSAW/'). $k['kdPenduduk']; ?>  "
                                            role="button">
                                             Ubah
                                            </a>
                                            <a class="label btn btn-danger btn-round btn-xs"
                                            href="<?= base_url('pSaw/delete/') . $k['kdPenduduk']; ?>  "
                                            role="button" onclick="return confirm ('Yakin?');">
                                           hapus
                                            </a>
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

