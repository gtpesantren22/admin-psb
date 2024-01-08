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
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-stamp">
                                        <div class="card-stamp-icon bg-green">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-cashapp" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M17.1 8.648a0.568 .568 0 0 1 -.761 .011a5.682 5.682 0 0 0 -3.659 -1.34c-1.102 0 -2.205 .363 -2.205 1.374c0 1.023 1.182 1.364 2.546 1.875c2.386 .796 4.363 1.796 4.363 4.137c0 2.545 -1.977 4.295 -5.204 4.488l-.295 1.364a0.557 .557 0 0 1 -.546 .443h-2.034l-.102 -.011a0.568 .568 0 0 1 -.432 -.67l.318 -1.444a7.432 7.432 0 0 1 -3.273 -1.784v-.011a0.545 .545 0 0 1 0 -.773l1.137 -1.102c.214 -.2 .547 -.2 .761 0a5.495 5.495 0 0 0 3.852 1.5c1.478 0 2.466 -.625 2.466 -1.614c0 -.989 -1 -1.25 -2.886 -1.954c-2 -.716 -3.898 -1.728 -3.898 -4.091c0 -2.75 2.284 -4.091 4.989 -4.216l.284 -1.398a0.545 .545 0 0 1 .545 -.432h2.023l.114 .012a0.544 .544 0 0 1 .42 .647l-.307 1.557a8.528 8.528 0 0 1 2.818 1.58l.023 .022c.216 .228 .216 .569 0 .773l-1.057 1.057z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title">
                                            Informasi Tanggungan

                                            <a href="<?= base_url('regist/tgnEdit/' . $santri->nis) ?>" class="btn btn-success ms-auto"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                                                </svg> Refresh Tanggungan</a>
                                            <button class="btn btn-warning ms-auto" type="button" data-bs-toggle="modal" data-bs-target="#modal-large"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                                    </path>
                                                    <path d="M10 18l5 -5a1.414 1.414 0 0 0 -2 -2l-5 5v2h2z"></path>
                                                </svg> Edit Tanggungan</button>
                                        </h3>
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-primary text-white avatar">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                                        <path d="M12 3v3m0 12v3" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Total Tanggungan
                                                </div>
                                                <div class="text-muted">
                                                    <?= rupiah($tgn->infaq + $tgn->buku + $tgn->kartu + $tgn->kalender + $tgn->seragam_pes + $tgn->seragam_lem + $tgn->orsaba + $tgn->buku_bio); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-success text-white avatar">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coin" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <circle cx="12" cy="12" r="9"></circle>
                                                        <path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1">
                                                        </path>
                                                        <path d="M12 7v10"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Sudah Bayar
                                                </div>
                                                <div class="text-muted">
                                                    <?= rupiah($byrSum->row('nominal')); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-danger text-white avatar">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coin-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M14.8 9a2 2 0 0 0 -1.8 -1h-1m-2.82 1.171a2 2 0 0 0 1.82 2.829h1m2.824 2.822a2 2 0 0 1 -1.824 1.178h-2a2 2 0 0 1 -1.8 -1">
                                                        </path>
                                                        <path d="M20.042 16.045a9 9 0 0 0 -12.087 -12.087m-2.318 1.677a9 9 0 1 0 12.725 12.73">
                                                        </path>
                                                        <path d="M12 6v2m0 8v2"></path>
                                                        <path d="M3 3l18 18"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    Kekurangan
                                                </div>
                                                <div class="text-muted">
                                                    <?= rupiah(($tgn->infaq + $tgn->buku + $tgn->kartu + $tgn->kalender + $tgn->seragam_pes + $tgn->seragam_lem + $tgn->orsaba + $tgn->buku_bio) - $byrSum->row('nominal')) ?>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <?php

                                        // $seragam_pes = $byrSum->row('nominal');
                                        // $seragam_lem = $seragam_pes - $tangg->seragam_pes;
                                        // $orsaba = $seragam_lem - $tangg->seragam_lem;
                                        // $kartu = $orsaba - $tangg->orsaba;
                                        // $buku = $kartu - $tangg->kartu;
                                        // $kalender = $buku - $tangg->buku;
                                        // $infaq = $kalender - $tangg->kalender;

                                        // echo $seragam_pes . ' seraagam pes, ';
                                        // echo $seragam_lem . ' seragam lem, ';
                                        // echo $orsaba . ' orsaba, ';
                                        // echo $kartu . ' kartu, ';
                                        // echo $buku . ' buku, ';
                                        // echo $kalender . ' kalender, ';
                                        // echo $infaq . ' infaq, ';

                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <div class="card">
                                    <div class="card-stamp">
                                        <div class="card-stamp-icon bg-green">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-forms" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 3a3 3 0 0 0 -3 3v12a3 3 0 0 0 3 3"></path>
                                                <path d="M6 3a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3"></path>
                                                <path d="M13 7h7a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-7"></path>
                                                <path d="M5 7h-1a1 1 0 0 0 -1 1v8a1 1 0 0 0 1 1h1"></path>
                                                <path d="M17 12h.01"></path>
                                                <path d="M13 12h.01"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title">Input Pembayaran
                                        </h3>
                                        <?= form_open('regist/saveAdd'); ?>
                                        <input type="hidden" name="nis" id="" value="<?= $santri->nis; ?>">
                                        <label class="form-label required">Nominal</label>
                                        <div>
                                            <input type="text" name="nominal" id="rupiah" class="form-control" placeholder="Nominal Bayar" required>
                                        </div>
                                        <br>
                                        <label class="form-label required">Tanggal Bayar</label>
                                        <div>
                                            <input type="text" name="tgl_bayar" class="form-control" id="datepicker" placeholder="Tanggal Bayar" required>
                                        </div>
                                        <br>
                                        <label class="form-label required">Via</label>
                                        <div>
                                            <label class="form-check">
                                                <input class="form-check-input" type="radio" name="via" value="Cash">
                                                <span class="form-check-label">Cash</span>
                                            </label>
                                            <label class="form-check">
                                                <input class="form-check-input" type="radio" name="via" value="Transfer">
                                                <span class="form-check-label">Transfer</span>
                                            </label>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-success">Simpan Pembayaran</button>
                                        </div>
                                        <?= form_close(); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mt-2">
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
                                        <h3 class="card-title">Rincian Tanggungan
                                            <a href="<?= base_url('regist/check/' . $santri->nis) ?>" class="btn btn-success ms-auto"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                                                </svg> Refresh</a>
                                        </h3>
                                        <table class="table table-sm">
                                            <tr>
                                                <th>1</th>
                                                <th>Seragam Pesantren</th>
                                                <th><?= check($tgn->st_seragam_pes) . rupiah($tgn->seragam_pes) ?></th>
                                            </tr>
                                            <tr>
                                                <th>2</th>
                                                <th>Seragam Lembaga (Khas dan Kaos Olahraga)</th>
                                                <th><?= check($tgn->st_seragam_lem) . rupiah($tgn->seragam_lem) ?></th>
                                            </tr>
                                            <tr>
                                                <th>3</th>
                                                <th>ORSABA</th>
                                                <th><?= check($tgn->st_orsaba) . rupiah($tgn->orsaba) ?></th>
                                            </tr>
                                            <tr>
                                                <th>4</th>
                                                <th>KTS, Kartu Mahrom, Kartu Kesehatan, dan Foto</th>
                                                <th><?= check($tgn->st_kartu) . rupiah($tgn->kartu) ?></th>
                                            </tr>
                                            <tr>
                                                <th>5</th>
                                                <th>Buku Pedoman Wiridan, Perizinan & Tatib</th>
                                                <th><?= check($tgn->st_buku) . rupiah($tgn->buku) ?></th>
                                            </tr>
                                            <tr>
                                                <th>6</th>
                                                <th>Kalender Pesantren</th>
                                                <th><?= check($tgn->st_kalender) . rupiah($tgn->kalender) ?></th>
                                            </tr>
                                            <tr>
                                                <th>7</th>
                                                <th>Uang Gedung</th>
                                                <th><?= check($tgn->st_infaq) . rupiah($tgn->infaq) ?></th>
                                            </tr>
                                            <tr>
                                                <th>8</th>
                                                <th>Buku Biografi</th>
                                                <th><?= check($tgn->st_buku_bio) . rupiah($tgn->buku_bio) ?></th>
                                            </tr>
                                            <tr style="background-color: green; color: white;">
                                                <th colspan="2">TOTAL</th>
                                                <th><?= rupiah($tgn->infaq + $tgn->buku + $tgn->kartu + $tgn->kalender + $tgn->seragam_pes + $tgn->seragam_lem + $tgn->orsaba + $tgn->buku_bio) ?>
                                                </th>
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
                                                                <a href="<?= base_url('regist/del/') . $row->id_regist ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan dihapus ?')">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                        </path>
                                                                        <line x1="4" y1="7" x2="20" y2="7"></line>
                                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12">
                                                                        </path>
                                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3">
                                                                        </path>
                                                                    </svg> Del</a>
                                                                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-large<?= $row->id_regist ?>" class="btn btn-warning btn-sm">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                        </path>
                                                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                                        </path>
                                                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                                        </path>
                                                                        <path d="M16 5l3 3"></path>
                                                                    </svg> Edit</button>
                                                                <a href="<?= base_url('regist/pesan/') . $row->id_regist ?>" class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                        </path>
                                                                        <line x1="10" y1="14" x2="21" y2="3"></line>
                                                                        <path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5">
                                                                        </path>
                                                                    </svg> Kirim</a>
                                                            </td>
                                                        </tr>
                                                        <div class="modal modal-blur fade" id="modal-large<?= $row->id_regist ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Edit Pembayaran</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <?= form_open('regist/editAdd') ?>
                                                                    <input type="hidden" name="nis" value="<?= $santri->nis; ?>">
                                                                    <input type="hidden" name="id_regist" value="<?= $row->id_regist; ?>">
                                                                    <div class="modal-body">
                                                                        <label class="form-label required">Nominal</label>
                                                                        <div>
                                                                            <input type="text" name="nominal" id="" class="form-control uang" placeholder="Nominal Bayar" value="<?= $row->nominal ?>" required>
                                                                        </div>
                                                                        <br>
                                                                        <label class="form-label required">Tanggal
                                                                            Bayar</label>
                                                                        <div>
                                                                            <input type="date" name="tgl_bayar" class="form-control" placeholder="Tanggal Bayar" value="<?= $row->tgl_bayar ?>" required>
                                                                        </div>
                                                                        <br>
                                                                        <label class="form-label required">Via</label>
                                                                        <div>
                                                                            <label class="form-check">
                                                                                <input class="form-check-input" type="radio" name="via" value="Cash" <?= $row->via === 'Cash' ? 'checked' : '' ?>>
                                                                                <span class="form-check-label">Cash</span>
                                                                            </label>
                                                                            <label class="form-check">
                                                                                <input class="form-check-input" type="radio" name="via" value="Transfer" <?= $row->via === 'Transfer' ? 'checked' : '' ?>>
                                                                                <span class="form-check-label">Transfer</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Simpan
                                                                            Perubahan</button>
                                                                    </div>
                                                                    <?= form_close(); ?>
                                                                </div>
                                                            </div>
                                                        </div>
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

<div class="modal modal-blur fade" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Tanggungan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('regist/tgnEdit2') ?>
            <input type="hidden" name="nis" value="<?= $santri->nis; ?>">
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <tr>
                            <th>1</th>
                            <th>Seragam Pesantren</th>
                            <th><input type="text" name="seragam_pes" class="form-control uang" value="<?= $tgn->seragam_pes ?>" required>
                            </th>
                        </tr>
                        <tr>
                            <th>2</th>
                            <th>Seragam Lembaga (Khas dan Kaos Olahraga)</th>
                            <th><input type="text" name="seragam_lem" class="form-control uang" value="<?= $tgn->seragam_lem ?>" required></th>
                        </tr>
                        <tr>
                            <th>3</th>
                            <th>ORSABA</th>
                            <th><input type="text" name="orsaba" class="form-control uang" value="<?= $tgn->orsaba ?>" required></th>
                        </tr>
                        <tr>
                            <th>4</th>
                            <th>KTS, Kartu Mahrom, Kartu Kesehatan, dan Foto</th>
                            <th><input type="text" name="kartu" class="form-control uang" value="<?= $tgn->kartu ?>" required></th>
                        </tr>
                        <tr>
                            <th>5</th>
                            <th>Buku Pedoman Wiridan, Perizinan & Tatib</th>
                            <th><input type="text" name="buku" class="form-control uang" value="<?= $tgn->buku ?>" required></th>
                        </tr>
                        <tr>
                            <th>6</th>
                            <th>Kalender Pesantren</th>
                            <th><input type="text" name="kalender" class="form-control uang" value="<?= $tgn->kalender ?>" required></th>
                        </tr>
                        <tr>
                            <th>7</th>
                            <th>Uang Gedung</th>
                            <th><input type="text" name="infaq" class="form-control uang" value="<?= $tgn->infaq ?>" required></th>
                        </tr>
                        <tr>
                            <th>8</th>
                            <th>Buku Biografi</th>
                            <th><input type="text" name="buku_bio" class="form-control uang" value="<?= $tgn->buku_bio ?>" required></th>
                        </tr>
                        <tr style=" background-color: greenyellow">
                            <th colspan="2">TOTAL</th>
                            <th><?= rupiah($tgn->infaq + $tgn->buku + $tgn->kartu + $tgn->kalender + $tgn->seragam_pes + $tgn->seragam_lem + $tgn->orsaba + $tgn->buku_bio) ?>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>