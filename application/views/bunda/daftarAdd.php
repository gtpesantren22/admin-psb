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
                    Biaya Pendafataran Santri Baru
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
                        <form class="card" method="POST" action="<?= base_url('daftar/saveAdd') ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label required">NIS</label>
                                            <div>
                                                <input type="text" name="nis" class="form-control"
                                                    aria-describedby="emailHelp" value="<?= $santri->nis; ?>" readonly>
                                            </div>
                                            <br>
                                            <label class="form-label required">Nama</label>
                                            <div>
                                                <input type="text" name="nama" class="form-control"
                                                    aria-describedby="emailHelp" value="<?= $santri->nama; ?>" readonly>
                                            </div>
                                            <br>
                                            <label class="form-label required">Alamat</label>
                                            <div>
                                                <input type="text" name="" class="form-control"
                                                    aria-describedby="emailHelp"
                                                    value="<?= $santri->desa . ' - ' . $santri->kec . ' - ' . $santri->kab; ?>"
                                                    readonly>
                                            </div>
                                            <br>
                                            <label class="form-label required">Nominal</label>
                                            <div>
                                                <input type="text" name="nama" class="form-control"
                                                    aria-describedby="emailHelp"
                                                    value="<?= 'Rp. ' . rupiah(gel($santri->gel)); ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label required">NIS</label>
                                            <div>
                                                <input type="text" name="nis" class="form-control"
                                                    aria-describedby="emailHelp" value="<?= $santri->nis; ?>" readonly>
                                            </div>
                                            <br>
                                            <label class="form-label required">Nama</label>
                                            <div>
                                                <input type="text" name="nama" class="form-control"
                                                    aria-describedby="emailHelp" value="<?= $santri->nama; ?>" readonly>
                                            </div>
                                            <br>
                                            <label class="form-label required">Alamat</label>
                                            <div>
                                                <input type="text" name="" class="form-control"
                                                    aria-describedby="emailHelp"
                                                    value="<?= $santri->desa . ' - ' . $santri->kec . ' - ' . $santri->kab; ?>"
                                                    readonly>
                                            </div>
                                            <br>
                                            <label class="form-label required">Nominal</label>
                                            <div>
                                                <input type="text" name="nama" class="form-control"
                                                    aria-describedby="emailHelp"
                                                    value="<?= 'Rp. ' . rupiah(gel($santri->gel)); ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>