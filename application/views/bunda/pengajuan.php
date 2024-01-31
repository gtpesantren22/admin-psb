<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Pengajuan
                </div>
                <h2 class="page-title">
                    Data Pengajuan
                </h2>
            </div>

        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Total Pengeluaran</div>
                            <div class="ms-auto lh-1">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                </div>
                            </div>
                        </div>
                        <div class="h1 mb-3"><?= rupiah($totalKeluar->total) ?></div>
                        <div class="d-flex mb-2">
                            <div>jumlah pengeluaran</div>
                            <div class="ms-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    %
                                    <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="3 17 9 11 13 15 21 7" />
                                        <polyline points="14 7 21 7 21 14" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Pengajuan Saya</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap" id="example">
                                <thead>
                                    <tr style="color: white; background-color: #17A2B8; font-weight: bold;">
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Bidang</th>
                                        <th>Bulan</th>
                                        <th>Tahun</th>
                                        <th>Nominal</th>
                                        <th>Status</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $ls_jns) :
                                        $spj = $this->db->query("SELECT * FROM spj WHERE kode_pengajuan = '$ls_jns->kode_pengajuan' ")->row();
                                        $bd = $this->db->query("SELECT nama FROM jabatan WHERE kode = '$ls_jns->bidang' ")->row();
                                        $jml = $this->db->query("SELECT SUM(qty*harga_satuan) AS total FROM pengajuan_detail WHERE kode_pengajuan = '$ls_jns->kode_pengajuan' ")->row();
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $ls_jns->kode_pengajuan; ?></td>
                                            <td><?= $bd->nama; ?></td>
                                            <td><?= $bulan[$ls_jns->bulan]; ?></td>
                                            <td><?= $ls_jns->tahun; ?></td>
                                            <td><?= rupiah($jml->total); ?></td>
                                            <td>
                                                <?php
                                                if ($ls_jns->status == 'proses') {
                                                    echo "<span class='badge bg-primary'><i class='bx bx-check'></i> Proses</span>";
                                                } elseif ($ls_jns->status == 'ditolak') {
                                                    echo "<span class='badge bg-danger'><i class='bx bx-x'></i> Ditolak</span>";
                                                } elseif ($ls_jns->status == 'disetujui') {
                                                    echo "<span class='badge bg-success'><i class='bx bx-check'></i> Disetujui</span>";
                                                } elseif ($ls_jns->status == 'dicairkan') {
                                                    echo "<span class='badge bg-success'><i class='bx bx-check'></i> Dicairkan</span>";
                                                    if ($spj->file_spj != '' && $spj->stts == 1) {
                                                        echo " | <a href='pengajuan/cekSpj/$ls_jns->kode_pengajuan' class='btn btn-sm btn-info'>Lihat SPJ</a>";
                                                    }
                                                } elseif ($ls_jns->status == 'selesai') {
                                                    echo "<span class='badge bg-info'><i class='bx bx-check'></i> Selesai</span>";
                                                } elseif ($ls_jns->status == 'belum') {
                                                    echo "<span class='badge bg-warning'>Input</span>";
                                                }
                                                ?>
                                            </td>
                                            <td><a href="<?= base_url('pengajuan/pengajuanDetail/' . $ls_jns->kode_pengajuan) ?>"><button class="btn btn-info btn-sm"><i class="bx bx-search"></i>
                                                        cek</button></a></td>
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