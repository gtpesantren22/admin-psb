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
                    Biaya Registrasi Santri Baru
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-large">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Tambah Pembayaran Baru
                    </a>
                    <a href="<?= base_url('regist/hasilBaru') ?>" class="btn btn-info d-none d-sm-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-description">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                            <path d="M9 17h6" />
                            <path d="M9 13h6" />
                        </svg>
                        Cek Hasil Pembayaran
                    </a>
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
                                        <th>Tanggungan</th>
                                        <th>Lunas</th>
                                        <th>Sisa</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($baru as $row) :
                                        $byr = $this->db->query("SELECT SUM(nominal) AS jml FROM regist WHERE nis = $row->nis")->row();
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row->nama; ?></td>
                                            <td><?= $row->lembaga; ?></td>
                                            <td><?= rupiah($row->infaq + $row->buku + $row->kartu + $row->kalender + $row->seragam_pes + $row->seragam_lem + $row->orsaba + $row->buku_bio + $row->kitab); ?>
                                            </td>
                                            <td><?= rupiah($byr->jml); ?></td>
                                            <td><?= rupiah(($row->infaq + $row->buku + $row->kartu + $row->kalender + $row->seragam_pes + $row->seragam_lem + $row->orsaba + $row->buku_bio + $row->kitab) - $byr->jml); ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('regist/infoSeragam/') . $row->nis ?>" class="btn btn-info btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shirt-sport">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M15 4l6 2v5h-3v8a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-8h-3v-5l6 -2a3 3 0 0 0 6 0" />
                                                        <path d="M10.5 11h2.5l-1.5 5" />
                                                    </svg> Seragam
                                                </a>
                                                <a href="<?= base_url('regist/inDaftar/') . $row->nis ?>" class="btn btn-warning btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                        </path>
                                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                        </path>
                                                        <path d="M16 5l3 3"></path>
                                                    </svg> Edit</a>
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

<div class="modal modal-blur fade" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pembayaran Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-sm" id="example2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Lembaga</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($nobp as $row) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->nama; ?></td>
                                    <td><?= $row->desa . ' - ' . $row->kec . ' - ' . $row->kab; ?></td>
                                    <td><?= $row->lembaga; ?></td>
                                    <td>
                                        <a href="<?= base_url('regist/addDaftar/') . $row->nis ?>" class="btn btn-success btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="9"></circle>
                                                <path d="M9 12l2 2l4 -4"></path>
                                            </svg> Pilih
                                        </a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>