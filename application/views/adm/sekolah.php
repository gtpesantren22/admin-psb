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
                                    id="btnUpload">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>