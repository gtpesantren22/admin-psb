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
                    Santri Baru
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
                        <h3 class="card-title">Data Santri Baru</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap" id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Jenkel</th>
                                        <th>Gel</th>
                                        <th>No. HP</th>
                                        <th>Lembaga Tujuan</th>
                                        <th>Anak/Sdr</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($baru as $row) :
                                        $jkl = $row['jkl'] == 'L' ? 'Laki-laki' : 'Perempuan';
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['nis']; ?></td>
                                            <td><?= $row['nama']; ?></td>
                                            <td><?= $row['desa'] . ' - ' . $row['kec'] . ' - ' . $row['kab']; ?></td>
                                            <td><?= $jkl; ?></td>
                                            <td><?= $row['gel']; ?></td>
                                            <td><?= $row['hp']; ?></td>
                                            <td><?= $row['lembaga']; ?></td>
                                            <td><?= $row['anak_ke'] . ' / ' . $row['jml_sdr'] . ' sdr'; ?></td>
                                            <?php if ($jenis == 'pusat') { ?>
                                                <td><?= $row['verval'] === 'Terverifikasi' ? "<span class='badge bg-green'>Terverifikasi</span>" : "<span class='badge bg-red'>Belum Terverifikasi</span>" ?></td>
                                            <?php } else { ?>
                                                <td><span class='badge bg-green'>Terverifikasi</span> | <button onclick="window.location.href='<?= base_url('santri/renew/' . $row['id_santri']) ?>'" class="btn btn-sm btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-a-b-2">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M16 21h3c.81 0 1.48 -.67 1.48 -1.48l.02 -.02c0 -.82 -.69 -1.5 -1.5 -1.5h-3v3z" />
                                                            <path d="M16 15h2.5c.84 -.01 1.5 .66 1.5 1.5s-.66 1.5 -1.5 1.5h-2.5v-3z" />
                                                            <path d="M4 9v-4c0 -1.036 .895 -2 2 -2s2 .964 2 2v4" />
                                                            <path d="M2.99 11.98a9 9 0 0 0 9 9m9 -9a9 9 0 0 0 -9 -9" />
                                                            <path d="M8 7h-4" />
                                                        </svg> Perbarui</button></td>
                                            <?php } ?>
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