<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Atribut Pendaftaran
                </div>
                <h2 class="page-title">
                    Atribut Pendaftaran Santri
                </h2>
            </div>
            <!-- Page title actions -->

            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-large">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Tambah Data Baru
                    </a>
                </div>
            </div>

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
                        <h3 class="card-title">Data Penerimaan Atribut</h3>
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
                        <?php if ($this->session->flashdata('ok')) : ?>
                            <div class="alert alert-success">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <path d="M9 12l2 2l4 -4"></path>
                                </svg>

                                <?= $this->session->flashdata('ok'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap table-sm" id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Majmu'</th>
                                        <th>Tatib</th>
                                        <th>KTS</th>
                                        <th>Mahrom</th>
                                        <th>Kes</th>
                                        <th>Kalender</th>
                                        <th>Pengasuh</th>
                                        <th>Sr. Pes</th>
                                        <th>Sr. Lem</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($baru as $row) :
                                    ?>
                                        <tr>
                                            <?= form_open('berkas/editAtr/'. $row->nis) ?>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row->nis; ?></td>
                                            <td><?= $row->nama; ?></td>
                                            <td><input class="form-check-input" type="checkbox" name="wir" <?= $row->wir === '1' ? "checked value='1'" : "value='0'" ?>></td>
                                            <td><input class="form-check-input" type="checkbox" name="tatib" <?= $row->tatib === '1' ? "checked value='1'" : "value='0'" ?>></td>
                                            <td><input class="form-check-input" type="checkbox" name="kts" <?= $row->kts === '1' ? "checked value='1'" : "value='0'" ?>></td>
                                            <td><input class="form-check-input" type="checkbox" name="mahrom" <?= $row->mahrom === '1' ? "checked value='1'" : "value='0'" ?>></td>
                                            <td><input class="form-check-input" type="checkbox" name="kes" <?= $row->kes === '1' ? "checked value='1'" : "value='0'" ?>></td>
                                            <td><input class="form-check-input" type="checkbox" name="kalender" <?= $row->kalender === '1' ? "checked value='1'" : "value='0'" ?>></td>
                                            <td><input class="form-check-input" type="checkbox" name="pengasuh" <?= $row->pengasuh === '1' ? "checked value='1'" : "value='0'" ?>></td>
                                            <td><input class="form-check-input" type="checkbox" name="seragam" <?= $row->seragam === '1' ? "checked value='1'" : "value='0'" ?>></td>
                                            <td><input class="form-check-input" type="checkbox" name="seragam_l" <?= $row->seragam_l === '1' ? "checked value='1'" : "value='0'" ?>></td>
                                            <td>
                                                <button class="btn btn-sm btn-info" type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                                        <circle cx="12" cy="14" r="2"></circle>
                                                        <polyline points="14 4 14 8 8 8 8 4"></polyline>
                                                    </svg> Simpan Data
                                                </button>
                                            </td>
                                            <?= form_close() ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pembayaran Baru</h5>
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
                            foreach ($atrNo as $row) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->nama; ?></td>
                                    <td><?= $row->desa . ' - ' . $row->kec . ' - ' . $row->kab; ?></td>
                                    <td><?= $row->lembaga; ?></td>
                                    <td>
                                        <a href="<?= base_url('berkas/addAtr/') . $row->nis ?>" class="btn btn-success btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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

<script>
    $(document).ready(function() {
        $("#insert").click(function() {
            var materi = [];
            $(".get_check").each(function() {
                if ($(this).is(":checked")) {
                    materi.push($(this).val());
                }
            });
            materi = materi.toString()
            $.ajax({
                url: "proses.php",
                method: "POST",
                data: {
                    materi: materi
                },
                success: function(data) {
                    $("#result").removeClass("d-none")
                    $("#result").addClass("d-block")
                    $("#result").html(data)
                    setTimeout(function() {
                        $("#result").removeClass("d-block")
                        $("#result").addClass("d-none")
                    }, 3000)
                }
            })
        })
    })
</script>