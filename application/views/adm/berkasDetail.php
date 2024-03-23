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
                        <h3 class="card-title">Detail Berkas Santri</h3>
                    </div>
                    <div class="card-body">
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
                                        <textarea id="" class="texteditor" name="catatan" required></textarea>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan </button>
                                </div>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>