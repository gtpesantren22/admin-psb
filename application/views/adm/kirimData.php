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
                    Santri Baru
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
                        <h3 class="card-title">Detail Santri</h3>
                    </div>
                    <div class="card-body">
                        <?php if ($this->session->flashdata('ok')) : ?>
                            <div class="alert alert-success"><?= $this->session->flashdata('ok') ?></div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('error')) : ?>
                            <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <li>Identitas Diri</li>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-sm">
                                            <tr>
                                                <td>NIS</td>
                                                <td>:</td>
                                                <td><?= $data->nis ?></td>
                                            </tr>
                                            <tr>
                                                <td>NIK</td>
                                                <td>:</td>
                                                <td><?= $data->nik ?></td>
                                            </tr>
                                            <tr>
                                                <td>No. KK</td>
                                                <td>:</td>
                                                <td><?= $data->no_kk ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Lengkap</td>
                                                <td>:</td>
                                                <td><?= $data->nama ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tetala</td>
                                                <td>:</td>
                                                <td><?= $data->tempat ?>, <?= $data->tanggal ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jkl</td>
                                                <td>:</td>
                                                <td><?= $data->jkl ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat Lengkap</td>
                                                <td>:</td>
                                                <td><?= $data->jln ?> RT/RW <?= $data->rt . '/' . $data->rw ?> Desa/Kel <?= $data->desa ?>, Kec. <?= $data->kec ?> - <?= $data->kab ?> - <?= $data->prov ?></td>
                                            </tr>
                                            <tr>
                                                <td>Anak ke</td>
                                                <td>:</td>
                                                <td><?= $data->anak_ke ?> - jml saudara : <?= $data->jml_sdr ?></td>
                                            </tr>
                                            <tr>
                                                <td>Lembaga Tujuan</td>
                                                <td>:</td>
                                                <td><?= $data->lembaga ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Daftar</td>
                                                <td>:</td>
                                                <td><?= $data->waktu_daftar ?></td>
                                            </tr>
                                            <tr>
                                                <td>Gel/Jalur</td>
                                                <td>:</td>
                                                <td><?= $data->gel . ' / ' . $data->jalur ?></td>
                                            </tr>
                                            <tr>
                                                <td>Pend. Sebelumnya</td>
                                                <td>:</td>
                                                <td><?= $data->npsn . ' - ' . $data->asal . ' - ' . $data->a_asal  ?></td>
                                            </tr>
                                            <tr>
                                                <td>No. HP</td>
                                                <td>:</td>
                                                <td><?= $data->hp ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="card-header">
                                        <li>Identitas Orang Tua</li>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-sm">
                                            <tr>
                                                <td>Nama Ayah</td>
                                                <td>:</td>
                                                <td><?= $data->bapak ?></td>
                                            </tr>
                                            <tr>
                                                <td>NIK Ayah</td>
                                                <td>:</td>
                                                <td><?= $data->a_nik ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tetala</td>
                                                <td>:</td>
                                                <td><?= $data->a_tempat ?>, <?= $data->a_tanggal ?></td>
                                            </tr>
                                            <tr>
                                                <td>Pendidikan</td>
                                                <td>:</td>
                                                <td><?= $data->a_pend ?></td>
                                            </tr>
                                            <tr>
                                                <td>Pekerjaan</td>
                                                <td>:</td>
                                                <td><?= $data->a_pkj ?></td>
                                            </tr>
                                            <tr>
                                                <td>Penghasilan</td>
                                                <td>:</td>
                                                <td><?= $data->a_hasil ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>:</td>
                                                <td><?= $data->a_stts ?></td>
                                            </tr>
                                            <!-- Ibu Data -->
                                            <tr>
                                                <td>Nama Ibu</td>
                                                <td>:</td>
                                                <td><?= $data->ibu ?></td>
                                            </tr>
                                            <tr>
                                                <td>NIK Ibu</td>
                                                <td>:</td>
                                                <td><?= $data->i_nik ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tetala</td>
                                                <td>:</td>
                                                <td><?= $data->i_tempat ?>, <?= $data->i_tanggal ?></td>
                                            </tr>
                                            <tr>
                                                <td>Pendidikan</td>
                                                <td>:</td>
                                                <td><?= $data->i_pend ?></td>
                                            </tr>
                                            <tr>
                                                <td>Pekerjaan</td>
                                                <td>:</td>
                                                <td><?= $data->i_pkj ?></td>
                                            </tr>
                                            <tr>
                                                <td>Penghasilan</td>
                                                <td>:</td>
                                                <td><?= $data->i_hasil ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>:</td>
                                                <td><?= $data->i_stts ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <li>Berkas Santri</li>
                                    </div>
                                    <div class="card-body">
                                        <h5>Foto Santri</h5>
                                        <img src="<?= $dir . 'foto/' . $foto->diri ?>" class="card-img-top">
                                        <br>
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>KK</td>
                                                <td>
                                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lihatBerkas" onclick="loadModalContent('kk','<?= $data->id_santri ?>')">Lihat Berkas</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Akta</td>
                                                <td>
                                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lihatBerkas" onclick="loadModalContent('akta','<?= $data->id_santri ?>')">Lihat Berkas</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>KTP Ayah</td>
                                                <td>
                                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lihatBerkas" onclick="loadModalContent('ktp_ayah','<?= $data->id_santri ?>')">Lihat Berkas</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>KTP Ibu</td>
                                                <td>
                                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lihatBerkas" onclick="loadModalContent('ktp_ibu','<?= $data->id_santri ?>')">Lihat Berkas</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>SKL</td>
                                                <td>
                                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lihatBerkas" onclick="loadModalContent('skl','<?= $data->id_santri ?>')">Lihat Berkas</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>KIP</td>
                                                <td>
                                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#lihatBerkas" onclick="loadModalContent('kip','<?= $data->id_santri ?>')">Lihat Berkas</button>
                                                </td>
                                            </tr>
                                        </table>
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

<div class="modal modal-blur fade" id="lihatBerkas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lihat Akta Kelahiran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalContent">
                <!-- Ok Data -->
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    function loadModalContent(jenis, id) {
        $.ajax({
            url: '<?= base_url("santriAdm/viewBerkasModal/") ?>' + jenis + '/' + id,
            type: 'GET',
            success: function(response) {
                $('#modalContent').html(response);
            },
            error: function(xhr, status, error) {
                var errorMessage = 'Failed to load modal content. Status: ' + status + '. Error: ' + error;
                if (xhr.responseText) {
                    errorMessage += '. Response: ' + xhr.responseText;
                }
                console.log(errorMessage);
            }
        });
    }
</script>