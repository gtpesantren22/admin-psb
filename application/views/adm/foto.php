<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Foto Santri
                </div>
                <h2 class="page-title">
                    Foto Santri Baru
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
                        <!-- <h3 class="card-title">Data Santri Baru</h3> -->
                        <a href="<?= base_url('image/kts/1') ?>" target="_blank" class="btn btn-sm btn-primary pull-right"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                            </svg>Lihat KTS Gel. 1</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap table-sm" id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Tujuan</th>
                                        <th>Foto</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $row) :
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row->nis; ?></td>
                                            <td><?= $row->nama; ?></td>
                                            <td><?= $row->desa . ' - ' . $row->kec . ' - ' . $row->kab; ?></td>
                                            <td><?= $row->lembaga; ?></td>
                                            <td><?= $row->diri; ?></td>
                                            <td>
                                                <a href="<?= base_url('image/detail/' . $row->nis); ?>" class="btn btn-sm btn-info"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697"></path>
                                                        <path d="M18 12v-5a2 2 0 0 0 -2 -2h-2"></path>
                                                        <rect x="8" y="3" width="6" height="4" rx="2"></rect>
                                                        <path d="M8 11h4"></path>
                                                        <path d="M8 15h3"></path>
                                                        <circle cx="16.5" cy="17.5" r="2.5"></circle>
                                                        <path d="M18.5 19.5l2.5 2.5"></path>
                                                    </svg> Cek
                                                </a>
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