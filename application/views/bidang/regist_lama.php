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
                    Biaya Registrasi Santri Lama
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">

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
                                            <td><?= rupiah($row->infaq + $row->buku + $row->kartu + $row->kalender + $row->seragam_pes + $row->seragam_lem + $row->orsaba); ?>
                                            </td>
                                            <td><?= rupiah($byr->jml); ?></td>
                                            <td><?= rupiah(($row->infaq + $row->buku + $row->kartu + $row->kalender + $row->seragam_pes + $row->seragam_lem + $row->orsaba) - $byr->jml); ?>
                                            </td>
                                            <td>
                                                <!-- <a href="<?= base_url('daftar/del/') . $row->id_tgn ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin akan dihapus ?')">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-trash" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <line x1="4" y1="7" x2="20" y2="7"></line>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                </svg> Del</a> -->
                                                <a href="<?= base_url('bidang/inDaftar/') . $row->nis ?>" class="btn btn-warning btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                        </path>
                                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                        </path>
                                                        <path d="M16 5l3 3"></path>
                                                    </svg> Detail</a>
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
