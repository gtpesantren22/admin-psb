<?php
$dir = 'https://psb.ppdwk.com/assets/berkas/';
// $dir = 'http://localhost/psb/assets/berkas/';
?>
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
                    Verifikasi Berkas Santri
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <?php if ($berkas) { ?>
                    <div class="btn-list">
                        <a href="<?= base_url('berkas/detail/' . $berkas->nis) ?>" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Upload Ulang Berkas
                        </a>
                        <button class="btn btn-success d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#kirimPesan">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Kirim Pesan
                        </button>
                    </div>
                <?php } ?>
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
                        <h3 class="card-title">Detail Berkas Santri : <?= $santri->nama ?></h3>
                    </div>
                    <div class="card-body">
                        <?php if ($berkas) { ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h3 class="card-title">Kartu Keluarga (KK)</h3>
                                                    <?php if (pathinfo($berkas->kk, PATHINFO_EXTENSION) == 'pdf') { ?>
                                                        <iframe src="<?= $dir . 'kk/' . $berkas->kk ?>" width="100%" style="border:none;"></iframe>
                                                    <?php } else { ?>
                                                        <img src="<?= $dir . 'kk/' . $berkas->kk ?>">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h3 class="card-title">Akta Kelahiran</h3>
                                                    <?php if (pathinfo($berkas->akta, PATHINFO_EXTENSION) == 'pdf') { ?>
                                                        <iframe src="<?= $dir . 'akta/' . $berkas->akta ?>" width="100%" style="border:none;"></iframe>
                                                    <?php } else { ?>
                                                        <img src="<?= $dir . 'akta/' . $berkas->akta ?>">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h3 class="card-title">KTP Ayah</h3>
                                                    <?php if (pathinfo($berkas->ktp_ayah, PATHINFO_EXTENSION) == 'pdf') { ?>
                                                        <iframe src="<?= $dir . 'ktp_ayah/' . $berkas->ktp_ayah ?>" width="100%" style="border:none;"></iframe>
                                                    <?php } else { ?>
                                                        <img src="<?= $dir . 'ktp_ayah/' . $berkas->ktp_ayah ?>">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h3 class="card-title">KTP Ibu</h3>
                                                    <?php if (pathinfo($berkas->ktp_ibu, PATHINFO_EXTENSION) == 'pdf') { ?>
                                                        <iframe src="<?= $dir . 'ktp_ibu/' . $berkas->ktp_ibu ?>" width="100%" style="border:none;"></iframe>
                                                    <?php } else { ?>
                                                        <img src="<?= $dir . 'ktp_ibu/' . $berkas->ktp_ibu ?>">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h3 class="card-title">Foto Santri</h3>
                                                    <?php if (pathinfo($foto->diri, PATHINFO_EXTENSION) == 'pdf') { ?>
                                                        <iframe src="<?= $dir . 'foto/' . $foto->diri ?>" width="100%" style="border:none;"></iframe>
                                                    <?php } else { ?>
                                                        <img src="<?= $dir . 'foto/' . $foto->diri ?>">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h3 class="card-title">KIP</h3>
                                                    <?php if (pathinfo($berkas->kip, PATHINFO_EXTENSION) == 'pdf') { ?>
                                                        <iframe src="<?= $dir . 'kip/' . $berkas->kip ?>" width="100%" style="border:none;"></iframe>
                                                    <?php } else { ?>
                                                        <img src="<?= $dir . 'kip/' . $berkas->kip ?>">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12">
                                    <?= form_open('santriAdm/addCatatan') ?>
                                    <input type="hidden" name="nis" value="<?= $santri->nis ?>">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Isi Catatan</label>
                                            <textarea id="" class="texteditor" name="catatan" required><?= $berkas->catatan ?></textarea>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan </button>
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                        <?php } else { ?>
                            <a href="<?= base_url('berkas/generate/' . $santri->nis) ?>" class="btn btn-success"><i class="ti ti-file-upload"></i> Genarate Upload Berkas</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="kirimPesan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kirim Pesan kepada wali santri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('santriAdm/kirimPesan') ?>" method="post" accept-charset="utf-8">
                <input type="hidden" name="nis" value="<?= $santri->nis ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">No. WA</label>
                        <input type="text" class="form-control" name="hp" value="<?= $santri->hp ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Isi pesan</label>
                        <textarea class="form-control" placeholder="Isi pesan yang akan disampaikan.." name="pesan" rows="5" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan </button>
                </div>
            </form>
        </div>
    </div>
</div>