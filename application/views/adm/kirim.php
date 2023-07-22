<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Data Santri
                </div>
                <h2 class="page-title">
                    Kirim Data Santri
                </h2>
            </div>
            <!-- Page title actions -->
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Santri</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap" id="">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Bapak</th>
                                        <th>Ibu</th>
                                        <th>Lembaga</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($dataHasil as $row) :
                                        $cekData = $this->model->cekNisDb2($row->nis)->row();
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row->nis; ?></td>
                                            <td><?= $row->nama; ?></td>
                                            <td><?= $row->desa . ' - ' . $row->kec . ' - ' . $row->kab; ?></td>
                                            <td><?= $row->bapak; ?></td>
                                            <td><?= $row->ibu; ?></td>
                                            <td>
                                                <span class="badge bg-success"><?= $row->lembaga; ?></span>
                                                <?= $row->ket == 'baru' ? "<span class='badge bg-primary'>Baru</span>" : "<span class='badge bg-danger'>Lama</span>" ?>
                                                <?= $cekData ? "<span class='badge bg-warning'>Ada</span>" : "" ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-warning" onclick="window.location = '<?= base_url('santri/send/' . $row->nis) ?>' ">Kirim</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>