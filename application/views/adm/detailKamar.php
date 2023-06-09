<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Kamar Santri
                </div>
                <h2 class="page-title">
                    Detail Kamar Santri
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
        <div class="row row-cards">
            <div class="col-md-12">
                <div class="row row-cards">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Detail Kamar</h3>

                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="avatar avatar-lg rounded" style="background-image: url(<?= 'https://psb.ppdwk.com/assets/berkas/' . $foto ?>)"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if ($santri) { ?>
                                            <h1 class="fw-bold"><?= $santri->nama ?></h1>
                                            <div class="my-2">NIS : <?= $santri->nis ?>
                                            </div>
                                            <div class="list-inline list-inline-dots text-muted">
                                                <div class="list-inline-item">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/map -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M3 7l6 -3l6 3l6 -3l0 13l-6 3l-6 -3l-6 3l0 -13" />
                                                        <path d="M9 4l0 13" />
                                                        <path d="M15 7l0 13" />
                                                    </svg>
                                                    <?= $santri->desa . ' - ' . $santri->kec . ' - ' . $santri->kab ?>
                                                </div>
                                                <br>
                                                <div class="list-inline-item">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                                        <path d="M3 7l9 6l9 -6" />
                                                    </svg>
                                                    <a href="#" class="text-reset">Lembaga : <?= $santri->lembaga ?></a>
                                                </div>
                                                <br>
                                                <div class="list-inline-item">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/cake -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M3 20h18v-8a3 3 0 0 0 -3 -3h-12a3 3 0 0 0 -3 3v8z" />
                                                        <path d="M3 14.803c.312 .135 .654 .204 1 .197a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1c.35 .007 .692 -.062 1 -.197" />
                                                        <path d="M12 4l1.465 1.638a2 2 0 1 1 -3.015 .099l1.55 -1.737z" />
                                                    </svg>
                                                    <?= $santri->tempat . ', ' . tanggalIndo2($santri->tanggal) ?>
                                                </div><br><br>
                                                <a href="<?= base_url('kamar/delMilik/' . $data->id) ?>" onclick="return confirm('Yakin akan dikosongi ?')" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M4 7h16"></path>
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                        <path d="M10 12l4 4m0 -4l-4 4"></path>
                                                    </svg> Hapus Pengguna</a>
                                            </div>
                                        <?php } else {
                                            echo "Belum ada pemilik";
                                        } ?>
                                    </div>
                                    <div class="col">
                                        <?= form_open('kamar/updateLoker') ?>
                                        <input type="hidden" name="id" value="<?= $data->id ?>">
                                        <div class="mb-2 row">
                                            <label class="col-3 col-form-label required">Komplek</label>
                                            <div class="col">
                                                <input type="text" class="form-control" aria-describedby="emailHelp" name="komplek" value="<?= $data->komplek ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-3 col-form-label required">Kamar</label>
                                            <div class="col">
                                                <input type="text" class="form-control" aria-describedby="emailHelp" name="kamar" value="<?= $data->kamar ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-3 col-form-label required">Lemari</label>
                                            <div class="col">
                                                <input type="text" class="form-control" aria-describedby="emailHelp" name="lemari" value="<?= $data->lemari ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-3 col-form-label required">Loker</label>
                                            <div class="col">
                                                <input type="text" class="form-control" aria-describedby="emailHelp" name="loker" value="<?= $data->loker ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-3 col-form-label required">Pilih Santri</label>
                                            <div class="col">
                                                <select type="text" name="nis" class="form-select" placeholder="Pilih Santri" id="select-users">
                                                    <option value=""> -pilih santri- </option>
                                                    <?php foreach ($santriData as $dts) : ?>
                                                        <option value="<?= $dts->nis ?>"><?= $dts->nama ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <button class="btn btn-success btn-sm" type="submit"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                    <path d="M14 4l0 4l-6 0l0 -4"></path>
                                                </svg> Simpan</button>
                                        </div>
                                        <?= form_close() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sunan Gunung Jati -->

                </div>
            </div>
        </div>
    </div>
</div>