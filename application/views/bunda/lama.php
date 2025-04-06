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
                    Santri Lanjutan
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
                        <h3 class="card-title">Data Santri Lanjutan</h3>
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
                                            <td><?= $row['verval'] === 'Terverifikasi' ? "<span class='badge bg-green'>Terverifikasi</span>" : "<span class='badge bg-red'>Belum Terverifikasi</span>" ?>
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