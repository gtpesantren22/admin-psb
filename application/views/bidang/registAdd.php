<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Biaya Registrasi Ulang
                </div>
                <h2 class="page-title">
                    Biaya Registrasi Ulang Santri Baru
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
                        <h3 class="card-title">Input Pendaftaran</h3>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card bg-primary text-primary-fg">
                                    <div class="card-stamp">
                                        <div class="card-stamp-icon bg-white text-primary">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="9"></circle>
                                                <circle cx="12" cy="10" r="3"></circle>
                                                <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title">Detail Santri</h3>
                                        <table>
                                            <tr>
                                                <th>NIS</th>
                                                <th>:</th>
                                                <th><?= $santri->nis; ?></th>
                                            </tr>
                                            <tr>
                                                <th>Nama</th>
                                                <th>:</th>
                                                <th><?= $santri->nama; ?></th>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <th>:</th>
                                                <th><?= $santri->desa . ' - ' . $santri->kec . ' - ' . $santri->kab; ?>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>Jkl</th>
                                                <th>:</th>
                                                <th><?= $santri->jkl; ?></th>
                                            </tr>
                                            <tr>
                                                <th>Lembaga</th>
                                                <th>:</th>
                                                <th><?= $santri->lembaga; ?> DWK</th>
                                            </tr>
                                            <tr>
                                                <th>Gelombang</th>
                                                <th>:</th>
                                                <th><?= $santri->gel; ?></th>
                                            </tr>
                                            <tr>
                                                <th>Jalur</th>
                                                <th>:</th>
                                                <th><?= $santri->jalur; ?></th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 mt-2">
                                <div class="card">
                                    <div class="card-stamp">
                                        <div class="card-stamp-icon bg-green">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-credit-card" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <rect x="3" y="5" width="18" height="14" rx="3"></rect>
                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                                <line x1="7" y1="15" x2="7.01" y2="15"></line>
                                                <line x1="11" y1="15" x2="13" y2="15"></line>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title">History Pembayaran</h3>
                                        <div class="table-responsive">
                                            <table class="table card-table table-vcenter text-nowrap table-sm" id="example">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tgl Bayar</th>
                                                        <th>Penerima</th>
                                                        <th>Via</th>
                                                        <th>Waktu Input</th>
                                                        <th>Nominal</th>
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
                                                            <td><?= $row->tgl_bayar; ?></td>
                                                            <td><?= $row->kasir; ?></td>
                                                            <td><?= $row->via; ?></td>
                                                            <td><?= $row->created; ?></td>
                                                            <td><?= rupiah($row->nominal); ?></td>
                                                            <td>

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
            </div>
        </div>
    </div>
</div>