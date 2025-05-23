<!-- Page header -->
<?php
if ($data['pd_lama'] == null) {
    $urlVerval = base_url('daftar/vervalNota2/') . $data['nik'];
    $gelPakai = $data['gelombang'];
} else {
    $gelPakai = 1;
    $urlVerval = base_url('daftar/vervalNota3/') . $data['nik'];
}
?>
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Data Santri
                </div>
                <h2 class="page-title">
                    Santri Baru (Verifikasi Berkas)
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
                        <h3 class="card-title">Detail Data Santri Baru</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                $extension = $data['dok_transfer']['extension'];
                                if ($extension == 'pdf') { ?>
                                    <iframe src="<?= 'https://data.ppdwk.com/storage/berkas-psb/' . $data['dok_transfer']['path'] ?>" width="100%" height="460" style="border:none;"></iframe>
                                <?php } else { ?>
                                    <img src="<?= 'https://data.ppdwk.com/storage/berkas-psb/' . $data['dok_transfer']['path'] ?>" alt="" height="460">
                                <?php } ?>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-sm no-border">
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><?= $data['nama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tetala</td>
                                        <td>:</td>
                                        <td><?= $data['tempat_lahir'] . ', ' . tanggalIndo2($data['tanggal_lahir']) ?></td>
                                    </tr>
                                    <tr>
                                        <td>JKL</td>
                                        <td>:</td>
                                        <td><?= $data['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?= $data['wilayah']['nama'] . ' - ' . $data['wilayah']['parrent_recursive']['nama'] . ' - ' . $data['wilayah']['parrent_recursive']['parrent_recursive']['nama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Bapak</td>
                                        <td>:</td>
                                        <td><?= $data['nama_ayah'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Ibu</td>
                                        <td>:</td>
                                        <td><?= $data['nama_ibu'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Anak ke</td>
                                        <td>:</td>
                                        <td><?= $data['anak_ke'] . ' dari ' . $data['jml_sdr'] . ' bersaudara' ?></td>
                                    </tr>
                                    <tr>
                                        <td>Lembaga Pilihan</td>
                                        <td>:</td>
                                        <td><?= $data['lembaga']['nama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>No.HP</td>
                                        <td>:</td>
                                        <td><?= $data['whatsapp'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Gelombag</th>
                                        <th>:</th>
                                        <th><?= $gelPakai ?></th>
                                    </tr>
                                    <tr>
                                        <th>Nominal</th>
                                        <th>:</th>
                                        <th><?= rupiah(gel($gelPakai)) ?></th>
                                    </tr>
                                </table>
                                <a href="<?= $urlVerval ?>" class="btn btn-success  tbl-confirm" value="Data sudah benar dan akan ditambahkan ke daftar calon santri baru"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path>
                                    </svg>Verifikasi Data Santri</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>