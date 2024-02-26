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
                                $extension = pathinfo($berkas->bukti, PATHINFO_EXTENSION);
                                if ($extension == 'pdf') { ?>
                                    <!-- <iframe src="<?= 'https://psb.ppdwk.com/assets/berkas/bukti/' . $berkas->bukti ?>" width="100%" height="460" style="border:none;"></iframe> -->
                                    <iframe src="<?= 'http://localhost/psb/assets/berkas/bukti/' . $berkas->bukti ?>" width="100%" height="460" style="border:none;"></iframe>
                                <?php } else { ?>
                                    <!-- <img src="<?= 'https://psb.ppdwk.com/assets/berkas/bukti/' . $berkas->bukti ?>" alt="" height="460"> -->
                                    <img src="<?= 'http://localhost/psb/assets/berkas/bukti/' . $berkas->bukti ?>" alt="" height="460">
                                <?php } ?>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-sm no-border">
                                    <tr>
                                        <td>NIK</td>
                                        <td>:</td>
                                        <td><?= $data->nik ?></td>
                                    </tr>
                                    <tr>
                                        <td>NO. KK</td>
                                        <td>:</td>
                                        <td><?= $data->no_kk ?></td>
                                    </tr>
                                    <tr>
                                        <td>NISN</td>
                                        <td>:</td>
                                        <td><?= $data->nisn ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><?= $data->nama ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tetala</td>
                                        <td>:</td>
                                        <td><?= $data->tempat . ', ' . tanggalIndo2($data->tanggal) ?></td>
                                    </tr>
                                    <tr>
                                        <td>JKL</td>
                                        <td>:</td>
                                        <td><?= $data->jkl ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?= $data->desa . ' - ' . $data->kec . ' - ' . $data->kab ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Bapak</td>
                                        <td>:</td>
                                        <td><?= $data->bapak ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Ibu</td>
                                        <td>:</td>
                                        <td><?= $data->ibu ?></td>
                                    </tr>
                                    <tr>
                                        <td>Anak ke</td>
                                        <td>:</td>
                                        <td><?= $data->anak_ke . ' dari ' . $data->jml_sdr . ' bersaudara' ?></td>
                                    </tr>
                                    <tr>
                                        <td>Lembaga Pilihan</td>
                                        <td>:</td>
                                        <td><?= $data->lembaga ?></td>
                                    </tr>
                                    <tr>
                                        <td>No.HP</td>
                                        <td>:</td>
                                        <td><?= $data->hp ?></td>
                                    </tr>
                                    <tr>
                                        <th>Gelombag</th>
                                        <th>:</th>
                                        <th><?= $data->gel ?></th>
                                    </tr>
                                    <tr>
                                        <th>Nominal</th>
                                        <th>:</th>
                                        <th><?= rupiah(gel($data->gel)) ?></th>
                                    </tr>
                                </table>
                                <a href="<?= base_url('santriAdm/verval/') . $data->nis ?>" class="btn btn-success  tbl-confirm" value="Data sudah benar dan akan ditambahkan ke daftar calon santri baru"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path>
                                    </svg>Verifikasi Data Santri
                                </a>
                                <a href="<?= base_url('santriAdm/kirimInfo/') . $data->id_santri ?>" class="btn btn-primary  tbl-confirm" value="Fitur ini akan mengirimkan pesan WA kepada calon santri baru">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail-forward" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 18h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v7.5"></path>
                                        <path d="M3 6l9 6l9 -6"></path>
                                        <path d="M15 18h6"></path>
                                        <path d="M18 15l3 3l-3 3"></path>
                                    </svg>
                                    Kirim Informasi
                                </a>
                                <a href="<?= base_url('santriAdm/edit2/') . $data->id_santri ?>" class="btn btn-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                        <path d="M16 5l3 3" />
                                    </svg>
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>