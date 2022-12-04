<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Berkas Pendaftaran
                </div>
                <h2 class="page-title">
                    Berkas Pendaftaran Santri
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
                        <h3 class="card-title">Detail Berkas # <?= $data->nis . ' - ' . $data->nama ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="mb-3">
                                            <label class="form-label required">Akta Kelahiran</label>
                                            <?php if ($data->akta != '') { ?>
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#akta"><i class="ti ti-file-upload"></i> Upload Ulang</button>
                                                <a href="<?= base_url('berkas/downakta/' . $data->nis) ?>" class="btn btn-success"><i class="ti ti-file-download"></i> Download</a>
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#viewakta"><i class="ti ti-file-search"></i> Lihat</button>
                                                <br>
                                                <small class="text-italic">* Upload max 10 Mb</small>
                                            <?php } else { ?>
                                                <div class="badge bg-danger">Belum Upload</div>
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#akta"><i class="ti ti-file-upload"></i> Upload Berkas</button><br>
                                                <small class="text-italic">* Upload max 10 Mb</small>
                                            <?php } ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Kartu Keluarga (KK)</label>
                                            <?php if ($data->kk != '') { ?>
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kk"><i class="ti ti-file-upload"></i> Upload Ulang</button>
                                                <a href="<?= base_url('berkas/downKK/' . $data->nis) ?>" class="btn btn-success"><i class="ti ti-file-download"></i> Download</a>
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#viewkk"><i class="ti ti-file-search"></i> Lihat</button>
                                                <br>
                                                <small class="text-italic">* Upload max 10 Mb</small>
                                            <?php } else { ?>
                                                <div class="badge bg-danger">Belum Upload</div>
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kk"><i class="ti ti-file-upload"></i> Upload Berkas</button><br>
                                                <small class="text-italic">* Upload max 10 Mb</small>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="mb-3">
                                            <label class="form-label required">SKL</label>
                                            <?php if ($data->skl != '') { ?>
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#skl"><i class="ti ti-file-upload"></i> Upload Ulang</button>
                                                <a href="<?= base_url('berkas/downskl/' . $data->nis) ?>" class="btn btn-success"><i class="ti ti-file-download"></i> Download</a>
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#viewskl"><i class="ti ti-file-search"></i> Lihat</button>
                                                <br>
                                                <small class="text-italic">* Upload max 10 Mb</small>
                                            <?php } else { ?>
                                                <div class="badge bg-danger">Belum Upload</div>
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#skl"><i class="ti ti-file-upload"></i> Upload Berkas</button><br>
                                                <small class="text-italic">* Upload max 10 Mb</small>
                                            <?php } ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">Ijazah</label>
                                            <?php if ($data->ijazah != '') { ?>
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ijazah"><i class="ti ti-file-upload"></i> Upload Ulang</button>
                                                <a href="<?= base_url('berkas/downijazah/' . $data->nis) ?>" class="btn btn-success"><i class="ti ti-file-download"></i> Download</a>
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#viewijazah"><i class="ti ti-file-search"></i> Lihat</button>
                                                <br>
                                                <small class="text-italic">* Upload max 10 Mb</small>
                                            <?php } else { ?>
                                                <div class="badge bg-danger">Belum Upload</div>
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ijazah"><i class="ti ti-file-upload"></i> Upload Berkas</button><br>
                                                <small class="text-italic">* Upload max 10 Mb</small>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="mb-3">
                                            <label class="form-label required">KTP Ayah</label>
                                            <?php if ($data->ktp_ayah != '') { ?>
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ktp_ayah"><i class="ti ti-file-upload"></i> Upload Ulang</button>
                                                <a href="<?= base_url('berkas/downktp_ayah/' . $data->nis) ?>" class="btn btn-success"><i class="ti ti-file-download"></i> Download</a>
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#viewktp_ayah"><i class="ti ti-file-search"></i> Lihat</button>
                                                <br>
                                                <small class="text-italic">* Upload max 10 Mb</small>
                                            <?php } else { ?>
                                                <div class="badge bg-danger">Belum Upload</div>
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ktp_ayah"><i class="ti ti-file-upload"></i> Upload Berkas</button><br>
                                                <small class="text-italic">* Upload max 10 Mb</small>
                                            <?php } ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label required">KTP Ibu</label>
                                            <?php if ($data->ktp_ibu != '') { ?>
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ktp_ibu"><i class="ti ti-file-upload"></i> Upload Ulang</button>
                                                <a href="<?= base_url('berkas/downktp_ibu/' . $data->nis) ?>" class="btn btn-success"><i class="ti ti-file-download"></i> Download</a>
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#viewktp_ibu"><i class="ti ti-file-search"></i> Lihat</button>
                                                <br>
                                                <small class="text-italic">* Upload max 10 Mb</small>
                                            <?php } else { ?>
                                                <div class="badge bg-danger">Belum Upload</div>
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ktp_ibu"><i class="ti ti-file-upload"></i> Upload Berkas</button><br>
                                                <small class="text-italic">* Upload max 10 Mb</small>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- AKTA -->
<div class="modal modal-blur fade" id="akta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Akta Kelahiran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open_multipart('berkas/uploadakta') ?>
            <div class="modal-body">
                <label for="">Pilih File</label>
                <input type="hidden" name="nis" value="<?= $data->nis; ?>">
                <input type="hidden" name="file_lama" value="<?= $data->akta; ?>">
                <input type="file" name="berkas" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan Berkas</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="viewakta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lihat Akta Kelahiran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe src="<?= base_url('../psb/assets/berkas/' . $data->akta) ?>" width="100%" height="500" style="border:none;"></iframe>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- KK -->
<div class="modal modal-blur fade" id="kk" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload KK</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open_multipart('berkas/uploadKK') ?>
            <div class="modal-body">
                <label for="">Pilih File</label>
                <input type="hidden" name="nis" value="<?= $data->nis; ?>">
                <input type="hidden" name="file_lama" value="<?= $data->kk; ?>">
                <input type="file" name="berkas" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan Berkas</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="viewkk" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lihat KK</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe src="<?= base_url('../psb/assets/berkas/' . $data->kk) ?>" width="100%" height="500" style="border:none;"></iframe>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- KTP Ayah -->
<div class="modal modal-blur fade" id="ktp_ayah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload KTP Ayah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open_multipart('berkas/uploadktp_ayah') ?>
            <div class="modal-body">
                <label for="">Pilih File</label>
                <input type="hidden" name="nis" value="<?= $data->nis; ?>">
                <input type="hidden" name="file_lama" value="<?= $data->ktp_ayah; ?>">
                <input type="file" name="berkas" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan Berkas</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="viewktp_ayah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lihat KTP Ayah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe src="<?= base_url('../psb/assets/berkas/' . $data->ktp_ayah) ?>" width="100%" height="500" style="border:none;"></iframe>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- KTP Ibu -->
<div class="modal modal-blur fade" id="ktp_ibu" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload KTP Ibu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open_multipart('berkas/uploadktp_ibu') ?>
            <div class="modal-body">
                <label for="">Pilih File</label>
                <input type="hidden" name="nis" value="<?= $data->nis; ?>">
                <input type="hidden" name="file_lama" value="<?= $data->ktp_ibu; ?>">
                <input type="file" name="berkas" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan Berkas</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="viewktp_ibu" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lihat KTP Ibu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe src="<?= base_url('../psb/assets/berkas/' . $data->ktp_ibu) ?>" width="100%" height="500" style="border:none;"></iframe>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- SKL -->
<div class="modal modal-blur fade" id="skl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload SKL</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open_multipart('berkas/uploadskl') ?>
            <div class="modal-body">
                <label for="">Pilih File</label>
                <input type="hidden" name="nis" value="<?= $data->nis; ?>">
                <input type="hidden" name="file_lama" value="<?= $data->skl; ?>">
                <input type="file" name="berkas" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan Berkas</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="viewskl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lihat SKL</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe src="<?= base_url('../psb/assets/berkas/' . $data->skl) ?>" width="100%" height="500" style="border:none;"></iframe>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- Iajazah -->
<div class="modal modal-blur fade" id="ijazah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Ijazah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open_multipart('berkas/uploadijazah') ?>
            <div class="modal-body">
                <label for="">Pilih File</label>
                <input type="hidden" name="nis" value="<?= $data->nis; ?>">
                <input type="hidden" name="file_lama" value="<?= $data->ijazah; ?>">
                <input type="file" name="berkas" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan Berkas</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="viewijazah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lihat Ijazah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe src="<?= base_url('../psb/assets/berkas/' . $data->ijazah) ?>" width="100%" height="500" style="border:none;"></iframe>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>