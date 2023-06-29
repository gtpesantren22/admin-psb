<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Biaya Pendafataran (Sementara)
                </div>
                <h2 class="page-title">
                    Biaya Pendafataran Santri (Sementara)
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">

                </div>
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
                        <h3 class="card-title">Data Pembayaran</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap table-sm" id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Lembaga</th>
                                        <th>Nominal</th>
                                        <th>Tgl Bayar</th>
                                        <th>Tgl Input</th>
                                        <th>Verifikator</th>
                                        <th>Via</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($smData as $row) :
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row->nama; ?></td>
                                            <td><?= $row->lembaga; ?></td>
                                            <td><?= rupiah($row->nominal); ?></td>
                                            <td><?= $row->tgl_bayar; ?></td>
                                            <td><?= $row->created; ?></td>
                                            <td><?= $row->kasir; ?></td>
                                            <td><span class="badge bg-green"><?= $row->via; ?></span></td>
                                            <td>
                                                <a href="<?= base_url('daftar/delSm/') . $row->id_bayar ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan dihapus ?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <line x1="4" y1="7" x2="20" y2="7"></line>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                    </svg> Del</a>
                                                <a href="<?= base_url('daftar/tarik/') . $row->id_bayar ?>" class="btn btn-primary btn-sm" onclick="return confirm('Yakin akan ditarik ?. Selanjutnya data ini akan hilang')"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack-push" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M6 10l-2 1l8 4l8 -4l-2 -1"></path>
                                                        <path d="M4 15l8 4l8 -4"></path>
                                                        <path d="M12 4v7"></path>
                                                        <path d="M15 8l-3 3l-3 -3"></path>
                                                    </svg> Tarik Data</a>
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