<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?= $judul; ?></h3>
            </div>
            
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                    <a href="<?= base_url('Rangking/print') ?>" class="btn btn-round btn-primary mb-3" target="_blank">Cetak</a>
                        <div class="x_title">
                            <h2>Laporan Rangking</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <!-- <table id="datatable-buttons" class="table table-striped table-bordered"> -->
                            <table id="datatable-responsive" class="table table-striped table-bordered bulk_action" cellspacing="0" width="100%">  
                                <thead>
                            <tr class="active">
                            <th class="col-md-1 text-center">No</th>
                            <th class="text-center">Nomor KK</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Rangking</th>
                            </tr>
                                </thead>
                                    <tbody>
                        <?php foreach ($penerima as $m => $jumlah) : ?>
                                <?php
                        $table = $this->page->getData('tableFinal');
                        $table1 = $this->page->getData('tableFinal1');
                        $no = "1";
                        foreach ($table as $item => $value) {
                            if ($value->Rangking <=  $table1) {
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
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>