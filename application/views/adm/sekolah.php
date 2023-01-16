<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Overview
                </div>
                <h2 class="page-title">
                    Dashboard
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

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <?php if ($this->session->flashdata('ok')) : ?>
                        <div class="alert alert-success mb-2"><?= $this->session->flashdata('ok') ?></div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger mb-2"><?= $this->session->flashdata('error') ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">TOTAL SEKOLAH</div>
                        </div>
                        <div class="h1 mb-3"><?= $jumlah ?></div>
                        <div class="d-flex mb-2">
                            <div>Total Jumlah Sekolah</div>
                            <div class="ms-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    7%
                                    <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="3 17 9 11 13 15 21 7" />
                                        <polyline points="14 7 21 7 21 14" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: 75%" role="progressbar"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
                                <span class="visually-hidden">75% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <!-- <div class="d-flex align-items-center">
                            <div class="subheader">Upload</div>
                        </div> -->
                        <form method="post" action="<?= base_url('import/import'); ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label">Pilih Berkas <small class="text-danger">*</small></label>
                                <input type="file" class="form-control form-control-sm" id="file" name="file"
                                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                    required>
                                <small class="text-danger">Upload excel or csv file only.</small>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light"
                                    id="btnUpload"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-upload" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                        <polyline points="7 9 12 4 17 9"></polyline>
                                        <line x1="12" y1="4" x2="12" y2="16"></line>
                                    </svg> Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <!-- <div class="d-flex align-items-center">
                            <div class="subheader">Upload</div>
                        </div> -->

                        <div class="form-group">
                            <label class="control-label">Kirim Info Untuk Melengkapi Persyaratan</label> <br>
                            <small class="text-danger">*</small>
                            <small class="text-danger">Bagi Santri baru yang terverifikasi selain MI dan RA</small>
                        </div>
                        <div class="form-group">
                            <a href="<?= base_url('info/infoBerkas'); ?>"
                                onclick="return confirm('Yakin akan dikirim ?')"
                                class="btn btn-primary btn-sm waves-effect waves-light"><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-brand-telegram" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4"></path>
                                </svg> Kirin Pesan</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <!-- <div class="d-flex align-items-center">
                            <div class="subheader">Upload</div>
                        </div> -->

                        <div class="form-group">
                            <label class="control-label">Tarik Data Santri Lanjutan</label> <br>
                            <small class="text-danger">*</small>
                            <small class="text-danger">Fitur ini digunakan untuk melakukan penarikan data santri
                                lanjutan</small>
                        </div>
                        <div class="form-group">
                            <button data-bs-toggle="modal" data-bs-target="#modal-large"
                                class="btn btn-warning btn-sm waves-effect waves-light"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-search"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                    <path d="M12 21h-5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v4.5"></path>
                                    <circle cx="16.5" cy="17.5" r="2.5"></circle>
                                    <line x1="18.5" y1="19.5" x2="21" y2="22"></line>
                                </svg> Pilih Santri</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tarik Data Santri Lanjutan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-sm" id="example2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Lembaga</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($lama as $row) :
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->nama; ?></td>
                                <td><?= $row->desa . ' - ' . $row->kec . ' - ' . $row->kab; ?></td>
                                <td><?= $row->t_formal; ?></td>
                                <td>
                                    <a href="<?= base_url('import/tarik/') . $row->nis ?>"
                                        onclick="return confirm('Yakin akan lanjutkan ke PSB ?')"
                                        class="btn btn-success btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-circle-check" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <path d="M9 12l2 2l4 -4"></path>
                                        </svg> Pilih</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>