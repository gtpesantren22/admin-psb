<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Biaya Pendafataran
                </div>
                <h2 class="page-title">
                    Biaya Registrasi (Sementara)
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
                                        <th>Nominal</th>
                                        <th>Waktu Input</th>
                                        <th>Tgl Bayar</th>
                                        <th>Penerima</th>
                                        <th>Via</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($byr->result() as $row) :
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row->nama; ?></td>
                                            <td><?= rupiah($row->nominal); ?></td>
                                            <td><?= $row->created; ?></td>
                                            <td><?= $row->tgl_bayar; ?></td>
                                            <td><?= $row->kasir; ?></td>
                                            <td><?= $row->via; ?></td>
                                            <td>
                                                <a href="<?= base_url('regist/tarik/') . $row->id_regist ?>" class="btn btn-primary btn-sm" onclick="return confirm('Yakin akan ditarik ?. Selanjutnya data ini akan hilang')"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack-push" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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