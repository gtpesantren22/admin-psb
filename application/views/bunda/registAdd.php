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
                        <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-triangle"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 9v2m0 4v.01"></path>
                                <path
                                    d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75">
                                </path>
                            </svg>

                            <?= $this->session->flashdata('error'); ?>
                        </div>
                        <?php endif; ?>
                        <form class="" method="POST" action="<?= base_url('daftar/saveAdd') ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card bg-primary text-primary-fg">
                                        <div class="card-stamp">
                                            <div class="card-stamp-icon bg-white text-primary">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-user-circle" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <circle cx="12" cy="12" r="9"></circle>
                                                    <circle cx="12" cy="10" r="3"></circle>
                                                    <path
                                                        d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855">
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
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-brand-cashapp" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M17.1 8.648a0.568 .568 0 0 1 -.761 .011a5.682 5.682 0 0 0 -3.659 -1.34c-1.102 0 -2.205 .363 -2.205 1.374c0 1.023 1.182 1.364 2.546 1.875c2.386 .796 4.363 1.796 4.363 4.137c0 2.545 -1.977 4.295 -5.204 4.488l-.295 1.364a0.557 .557 0 0 1 -.546 .443h-2.034l-.102 -.011a0.568 .568 0 0 1 -.432 -.67l.318 -1.444a7.432 7.432 0 0 1 -3.273 -1.784v-.011a0.545 .545 0 0 1 0 -.773l1.137 -1.102c.214 -.2 .547 -.2 .761 0a5.495 5.495 0 0 0 3.852 1.5c1.478 0 2.466 -.625 2.466 -1.614c0 -.989 -1 -1.25 -2.886 -1.954c-2 -.716 -3.898 -1.728 -3.898 -4.091c0 -2.75 2.284 -4.091 4.989 -4.216l.284 -1.398a0.545 .545 0 0 1 .545 -.432h2.023l.114 .012a0.544 .544 0 0 1 .42 .647l-.307 1.557a8.528 8.528 0 0 1 2.818 1.58l.023 .022c.216 .228 .216 .569 0 .773l-1.057 1.057z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h3 class="card-title">Informasi Tanggungan</h3>
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-primary text-white avatar">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                                            <path d="M12 3v3m0 12v3" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col">
                                                    <div class="font-weight-medium">
                                                        Total Tanggungan
                                                    </div>
                                                    <div class="text-muted">
                                                        <?= rupiah($tgn->infaq + $tgn->buku + $tgn->kartu + $tgn->kalender + $tgn->seragam_pes + $tgn->seragam_lem + $tgn->orsaba); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-success text-white avatar">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-coin" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <circle cx="12" cy="12" r="9"></circle>
                                                            <path
                                                                d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1">
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
                                                        <?= rupiah($byr->nominal); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <span class="bg-danger text-white avatar">
                                                        <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-coin-off" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path
                                                                d="M14.8 9a2 2 0 0 0 -1.8 -1h-1m-2.82 1.171a2 2 0 0 0 1.82 2.829h1m2.824 2.822a2 2 0 0 1 -1.824 1.178h-2a2 2 0 0 1 -1.8 -1">
                                                            </path>
                                                            <path
                                                                d="M20.042 16.045a9 9 0 0 0 -12.087 -12.087m-2.318 1.677a9 9 0 1 0 12.725 12.73">
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
                                                        <?= rupiah(($tgn->infaq + $tgn->buku + $tgn->kartu + $tgn->kalender + $tgn->seragam_pes + $tgn->seragam_lem + $tgn->orsaba) - $byr->nominal) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Baris ke dua -->
                                <!-- <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label ">NIS</label>
                                            <div>
                                                <input type="text" name="nis" class="form-control"
                                                    aria-describedby="emailHelp" value="<?= $santri->nis; ?>" readonly>
                                            </div>
                                            <br>
                                            <label class="form-label ">Nama</label>
                                            <div>
                                                <input type="text" name="nama" class="form-control"
                                                    aria-describedby="emailHelp" value="<?= $santri->nama; ?>" readonly>
                                            </div>
                                            <br>
                                            <label class="form-label ">Alamat</label>
                                            <div>
                                                <input type="text" name="" class="form-control"
                                                    aria-describedby="emailHelp"
                                                    value="<?= $santri->desa . ' - ' . $santri->kec . ' - ' . $santri->kab; ?>"
                                                    readonly>
                                            </div>
                                            <br>
                                            <label class="form-label ">Nominal</label>
                                            <div>
                                                <input type="text" name="tangg" class="form-control"
                                                    aria-describedby="emailHelp"
                                                    value="<?= 'Rp. ' . rupiah(gel($santri->gel)); ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label required">Nominal</label>
                                            <div>
                                                <input type="text" name="nominal" id="rupiah" class="form-control"
                                                    placeholder="Nominal Bayar" required>
                                            </div>
                                            <br>
                                            <label class="form-label required">Tanggal Bayar</label>
                                            <div>
                                                <input type="text" name="tgl_bayar" class="form-control" id="datepicker"
                                                    placeholder="Tanggal Bayar" required>
                                            </div>
                                            <br>
                                            <label class="form-label required">Via</label>
                                            <div>
                                                <label class="form-check">
                                                    <input class="form-check-input" type="radio" name="via"
                                                        value="Cash">
                                                    <span class="form-check-label">Cash</span>
                                                </label>
                                                <label class="form-check">
                                                    <input class="form-check-input" type="radio" name="via"
                                                        value="Transfer">
                                                    <span class="form-check-label">Transfer</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>