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
                        <h3 class="card-title">Input Pendaftaran</h3>
                    </div>
                    <div class="card-body">
                        <?php if ($this->session->flashdata('error')) : ?>
                            <div class="alert alert-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-triangle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 9v2m0 4v.01"></path>
                                    <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75">
                                    </path>
                                </svg>

                                <?= $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <form class="card" method="POST" action="<?= base_url('daftar/saveAdd') ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label ">NIS</label>
                                            <div>
                                                <input type="text" name="nis" class="form-control" aria-describedby="emailHelp" value="<?= $santri->nis; ?>" readonly>
                                                <!-- <input type="hidden" name="id_bayar" class="form-control" aria-describedby="emailHelp" value="<?= $bp->id_bayar; ?>" readonly> -->
                                            </div>
                                            <br>
                                            <label class="form-label ">Nama</label>
                                            <div>
                                                <input type="text" name="nama" class="form-control" aria-describedby="emailHelp" value="<?= $santri->nama; ?>" readonly>
                                            </div>
                                            <br>
                                            <label class="form-label ">Alamat</label>
                                            <div>
                                                <input type="text" name="" class="form-control" aria-describedby="emailHelp" value="<?= $santri->desa . ' - ' . $santri->kec . ' - ' . $santri->kab; ?>" readonly>
                                            </div>
                                            <br>
                                            <label class="form-label ">Nominal</label>
                                            <div>
                                                <input type="text" name="tangg" class="form-control" aria-describedby="emailHelp" value="<?= rupiah(gel($santri->gel)); ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label required">Nominal</label>
                                            <div>
                                                <input type="text" name="nominal" id="rupiah" class="form-control" placeholder="Nominal Bayar" required>
                                            </div>
                                            <br>
                                            <label class="form-label required">Tanggal Bayar</label>
                                            <div>
                                                <input type="text" name="tgl_bayar" class="form-control" id="datepicker" placeholder="Tanggal Bayar" required>
                                            </div>
                                            <br>
                                            <label class="form-label required">Via</label>
                                            <div>
                                                <label class="form-check">
                                                    <input class="form-check-input" type="radio" name="via" value="Cash">
                                                    <span class="form-check-label">Cash</span>
                                                </label>
                                                <label class="form-check">
                                                    <input class="form-check-input" type="radio" name="via" value="Transfer">
                                                    <span class="form-check-label">Transfer</span>
                                                </label>
                                            </div>
                                            <br>
                                            <label class="form-label required">Verifikator</label>
                                            <div>
                                                <input type="text" name="kasir" class="form-control" id="" placeholder="Tanggal Bayar" readonly value="<?= $user->nama; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-success">Simpan Pembayaran</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>