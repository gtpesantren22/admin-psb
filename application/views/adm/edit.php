<?php
$tglA = $data->a_tanggal == '' ? '00-00-0000' : $data->a_tanggal;
$tglI = $data->i_tanggal == '' ? '00-00-0000' : $data->i_tanggal;

$split = explode('-', $data->tanggal);
$tgl = $split[0];
$bln =  $split[1];
$thn = $split[2];

$splitA = explode('-', $tglA);
$tgl_a = $splitA[0];
$bln_a =  $splitA[1];
$thn_a = $splitA[2];

$spliti = explode('-', $tglI);
$tgl_i = $spliti[0];
$bln_i = $spliti[1];
$thn_i = $spliti[2];

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
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                                    <li class="nav-item">
                                        <a href="#diri" class="nav-link active" data-bs-toggle="tab">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <circle cx="12" cy="7" r="4" />
                                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                            </svg>
                                            Identitas Diri
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#mahrom" class="nav-link" data-bs-toggle="tab">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="9" cy="7" r="4"></circle>
                                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                            </svg>
                                            Data Orang Tua
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#alamat" class="nav-link" data-bs-toggle="tab">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="11" r="3"></circle>
                                                <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path>
                                            </svg>
                                            Alamat
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#pendidikan" class="nav-link" data-bs-toggle="tab">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-school" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6"></path>
                                                <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4"></path>
                                            </svg>
                                            Pendidikan
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#lain" class="nav-link" data-bs-toggle="tab">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M3.5 5.5l1.5 1.5l2.5 -2.5"></path>
                                                <path d="M3.5 11.5l1.5 1.5l2.5 -2.5"></path>
                                                <path d="M3.5 17.5l1.5 1.5l2.5 -2.5"></path>
                                                <line x1="11" y1="6" x2="20" y2="6"></line>
                                                <line x1="11" y1="12" x2="20" y2="12"></line>
                                                <line x1="11" y1="18" x2="20" y2="18"></line>
                                            </svg>
                                            Lainnya
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#berkas" class="nav-link" data-bs-toggle="tab">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-zip" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M6 20.735a2 2 0 0 1 -1 -1.735v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-1" />
                                                <path d="M11 17a2 2 0 0 1 2 2v2a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-2a2 2 0 0 1 2 -2z" />
                                                <path d="M11 5l-1 0" />
                                                <path d="M13 7l-1 0" />
                                                <path d="M11 9l-1 0" />
                                                <path d="M13 11l-1 0" />
                                                <path d="M11 13l-1 0" />
                                                <path d="M13 15l-1 0" />
                                            </svg>
                                            Berkas
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="diri">
                                        <form action="<?= base_url('santriAdm/saveIdentitas'); ?>" method="post" class="form-horizontal">
                                            <input type="hidden" name="nis" value="<?= $data->nis ?>">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="row">
                                                        <div class="col-md-6 col-xl-12">
                                                            <div class="mb-3 row">
                                                                <label for="" class="col-3 col-form-label">NIK</label>
                                                                <div class="col">
                                                                    <input type="text" name="nik" class="form-control" value="<?= $data->nik ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="" class="col-3 col-form-label">No. KK</label>
                                                                <div class="col">
                                                                    <input type="text" name="no_kk" class="form-control" value="<?= $data->no_kk ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="" class="col-3 col-form-label">NISN</label>
                                                                <div class="col">
                                                                    <input type="text" name="nisn" class="form-control" value="<?= $data->nisn ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="" class="col-3 col-form-label">Nama</label>
                                                                <div class="col">
                                                                    <input type="text" name="nama" class="form-control" value="<?= $data->nama ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="" class="col-3 col-form-label">Tmp Lahir</label>
                                                                <div class="col">
                                                                    <input type="text" name="tempat" class="form-control" value="<?= $data->tempat ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="" class="col-3 col-form-label">Tgl Lahir</label>
                                                                <div class="col">
                                                                    <select class="form-control" name="tanggal" required>
                                                                        <option value=""> -pilih- </option>
                                                                        <?php
                                                                        for ($tanggal = 1; $tanggal <= 31; $tanggal++) {
                                                                            $i = $tanggal;
                                                                            if ($tgl == $i) {
                                                                                echo "<option value=$i selected>$i</option>";
                                                                            } else {
                                                                                echo "<option value=$i>$i</option>";
                                                                            }
                                                                            echo "<option value=$i>$i</option>";
                                                                        }
                                                                        ?>
                                                                    </select>

                                                                    <select class="form-control" name="bulan" required>
                                                                        <option value=""> -pilih- </option>
                                                                        <?php
                                                                        for ($bulan = 1; $bulan <= 12; $bulan++) {
                                                                            if ($bln == $bulan) {
                                                                                echo "<option value=$bulan selected>" . bulan($bulan) . "</option>";
                                                                            } else {
                                                                                echo "<option value=$bulan>" . bulan($bulan) . "</option>";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>

                                                                    <select class="form-control" name="tahun" required>
                                                                        <option value=""> -pilih- </option>
                                                                        <?php
                                                                        $now = date("Y");
                                                                        for ($tahun = 1945; $tahun <= $now; $tahun++) {
                                                                            if ($thn == $tahun) {
                                                                                echo "<option value=$tahun selected>$tahun</option>";
                                                                            } else {
                                                                                echo "<option value=$tahun>$tahun</option>";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="row">
                                                        <div class="col-md-6 col-xl-12">
                                                            <div class="mb-3 row">
                                                                <label for="" class="col-3 col-form-label">Lembaga</label>
                                                                <div class="col">
                                                                    <input type="radio" name="lembaga" value="RA" required <?= $data->lembaga === 'RA' ? 'checked' : '' ?>> RA
                                                                    <input type="radio" name="lembaga" value="MI" required <?= $data->lembaga === 'MI' ? 'checked' : '' ?>> MI
                                                                    <input type="radio" name="lembaga" value="MTs" required <?= $data->lembaga === 'MTs' ? 'checked' : '' ?>> MTs
                                                                    <input type="radio" name="lembaga" value="SMP" required <?= $data->lembaga === 'SMP' ? 'checked' : '' ?>> SMP
                                                                    <input type="radio" name="lembaga" value="MA" required <?= $data->lembaga === 'MA' ? 'checked' : '' ?>> MA
                                                                    <input type="radio" name="lembaga" value="SMK" required <?= $data->lembaga === 'SMK' ? 'checked' : '' ?>> SMK
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="" class="col-3 col-form-label">Gelombang</label>
                                                                <div class="col">
                                                                    ke <?= $data->gel; ?>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="" class="col-3 col-form-label">Jenkel</label>
                                                                <div class="col">
                                                                    <input type="radio" name="jkl" value="Laki-laki" <?= $data->jkl === 'Laki-laki' ? 'checked' : '' ?> required>
                                                                    Laki-laki
                                                                    <input type="radio" name="jkl" value="Perempuan" <?= $data->jkl === 'Perempuan' ? 'checked' : '' ?> required>
                                                                    Perempuan
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="" class="col-3 col-form-label">Agama</label>
                                                                <div class="col">
                                                                    <select name="agama" id="" class="form-control" required>
                                                                        <option value=""> -pilih- </option>
                                                                        <?php foreach ($agama as $ar) : ?>
                                                                            <option value="<?= $ar->nama; ?>" <?= $ar->nama === $data->agama ? 'selected' : '' ?>>
                                                                                <?= $ar->nama; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="" class="col-3 col-form-label">Anak ke</label>
                                                                <div class="col">
                                                                    <input type="number" name="anak_ke" id="" class="form-control" value="<?= $data->anak_ke; ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="" class="col-3 col-form-label">Jml Sdr</label>
                                                                <div class="col">
                                                                    <input type="number" name="jml_sdr" id="" class="form-control" value="<?= $data->jml_sdr; ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="" class="col-3 col-form-label"></label>
                                                                <div class="col">
                                                                    <button class="btn btn-success pull-right" type="submit"><i class="fa fa-save"></i>
                                                                        Simpan</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="mahrom">
                                        <h4>Data Ayah</h4>
                                        <form action="<?= base_url('santriAdm/saveMahrom'); ?>" method="post" class="form-horizontal">
                                            <div class="row">
                                                <input type="hidden" name="nis" value="<?= $data->nis ?>">
                                                <div class="col-md-6">
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label">NIK Ayah</label>
                                                        <div class="col">
                                                            <input type="text" name="a_nik" class="form-control" maxlength="16" value="<?= $data->a_nik ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label">Nama Ayah</label>
                                                        <div class="col">
                                                            <input type="text" name="bapak" class="form-control" value="<?= $data->bapak ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label">Tmp Lahir</label>
                                                        <div class="col">
                                                            <input type="text" name="a_tempat" class="form-control" value="<?= $data->a_tempat ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label">Tgl Lahir</label>
                                                        <div class="col">


                                                            <select class="form-control" name="tanggal" required>
                                                                <option value=""> -pilih- </option>
                                                                <?php
                                                                for ($tanggal = 1; $tanggal <= 31; $tanggal++) {
                                                                    $i = $tanggal;
                                                                    if ($tgl_a == $i) {
                                                                        echo "<option value=$i selected>$i</option>";
                                                                    } else {
                                                                        echo "<option value=$i>$i</option>";
                                                                    }
                                                                    echo "<option value=$i>$i</option>";
                                                                }
                                                                ?>
                                                            </select>

                                                            <select class="form-control" name="bulan" required>
                                                                <option value=""> -pilih- </option>
                                                                <?php
                                                                for ($bulan = 1; $bulan <= 12; $bulan++) {
                                                                    if ($bln_a == $bulan) {
                                                                        echo "<option value=$bulan selected>" . bulan($bulan) . "</option>";
                                                                    } else {
                                                                        echo "<option value=$bulan>" . bulan($bulan) . "</option>";
                                                                    }
                                                                }
                                                                ?>
                                                            </select>

                                                            <select class="form-control" name="tahun" required>
                                                                <option value=""> -pilih- </option>
                                                                <?php
                                                                $now = date("Y");
                                                                for ($tahun = 1945; $tahun <= $now; $tahun++) {
                                                                    if ($thn_a == $tahun) {
                                                                        echo "<option value=$tahun selected>$tahun</option>";
                                                                    } else {
                                                                        echo "<option value=$tahun>$tahun</option>";
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label">Pendidikan</label>
                                                        <div class="col">
                                                            <select name="a_pend" id="" class="form-control" required>
                                                                <option value=""> -pilih- </option>
                                                                <?php foreach ($pend as $ar) : ?>
                                                                    <option value="<?= $ar->nama; ?>" <?= $ar->nama === $data->a_pend ? 'selected' : '' ?>>
                                                                        <?= $ar->nama; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label">Pekerjaan</label>
                                                        <div class="col">
                                                            <select name="a_pkj" id="" class="form-control" required>
                                                                <option value=""> -pilih- </option>
                                                                <?php foreach ($pkj as $ar) : ?>
                                                                    <option value="<?= $ar->nama; ?>" <?= $ar->nama === $data->a_pkj ? 'selected' : '' ?>>
                                                                        <?= $ar->nama; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label">Penghasilan</label>
                                                        <div class="col">
                                                            <select name="a_hasil" id="" class="form-control" required>
                                                                <option value=""> -pilih- </option>
                                                                <?php foreach ($hasil as $ar) : ?>
                                                                    <option value="<?= $ar->nama; ?>" <?= $ar->nama === $data->a_hasil ? 'selected' : '' ?>>
                                                                        <?= $ar->nama; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label">Status</label>
                                                        <div class="col">
                                                            <input type="radio" name="a_stts" value="Hidup" <?= $data->a_stts === 'Hidup' ? 'checked' : '' ?> required>
                                                            Masih Hidup
                                                            <input type="radio" name="a_stts" value="Meninggal" <?= $data->a_stts === 'Meninggal' ? 'checked' : '' ?> required>
                                                            Meniggal
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="box-header with-border">
                                                <h3 class="box-title"><i class="fa fa-user"></i> Data Ibu</h3>
                                            </div>
                                            <div class="row">
                                                <input type="hidden" name="nis" value="<?= $data->nis ?>">
                                                <div class="col-md-6">
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label">NIK Ibu</label>
                                                        <div class="col">
                                                            <input type="text" name="i_nik" class="form-control" maxlength="16" value="<?= $data->i_nik ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label">Nama Ibu</label>
                                                        <div class="col">
                                                            <input type="text" name="ibu" class="form-control" value="<?= $data->ibu ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label">Tmp Lahir</label>
                                                        <div class="col">
                                                            <input type="text" name="i_tempat" class="form-control" value="<?= $data->i_tempat ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label">Tgl Lahir</label>
                                                        <div class="col">


                                                            <select class="form-control" name="tanggal_i" required>
                                                                <option value=""> -pilih- </option>
                                                                <?php
                                                                for ($tanggal = 1; $tanggal <= 31; $tanggal++) {
                                                                    $i = $tanggal;
                                                                    if ($tgl_i == $i) {
                                                                        echo "<option value=$i selected>$i</option>";
                                                                    } else {
                                                                        echo "<option value=$i>$i</option>";
                                                                    }
                                                                    echo "<option value=$i>$i</option>";
                                                                }
                                                                ?>
                                                            </select>

                                                            <select class="form-control" name="bulan_i" required>
                                                                <option value=""> -pilih- </option>
                                                                <?php
                                                                for ($bulan = 1; $bulan <= 12; $bulan++) {
                                                                    if ($bln_i == $bulan) {
                                                                        echo "<option value=$bulan selected>" . bulan($bulan) . "</option>";
                                                                    } else {
                                                                        echo "<option value=$bulan>" . bulan($bulan) . "</option>";
                                                                    }
                                                                }
                                                                ?>
                                                            </select>

                                                            <select class="form-control" name="tahun_i" required>
                                                                <option value=""> -pilih- </option>
                                                                <?php
                                                                $now = date("Y");
                                                                for ($tahun = 1945; $tahun <= $now; $tahun++) {
                                                                    if ($thn_i == $tahun) {
                                                                        echo "<option value=$tahun selected>$tahun</option>";
                                                                    } else {
                                                                        echo "<option value=$tahun>$tahun</option>";
                                                                    }
                                                                }
                                                                ?>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label">Pendidikan</label>
                                                        <div class="col">
                                                            <select name="i_pend" id="" class="form-control" required>
                                                                <option value=""> -pilih- </option>
                                                                <?php foreach ($pend as $ar) : ?>
                                                                    <option value="<?= $ar->nama; ?>" <?= $ar->nama === $data->i_pend ? 'selected' : '' ?>>
                                                                        <?= $ar->nama; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label">Pekerjaan</label>
                                                        <div class="col">
                                                            <select name="i_pkj" id="" class="form-control" required>
                                                                <option value=""> -pilih- </option>
                                                                <?php foreach ($pkj as $ar) : ?>
                                                                    <option value="<?= $ar->nama; ?>" <?= $ar->nama === $data->i_pkj ? 'selected' : '' ?>>
                                                                        <?= $ar->nama; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label">Penghasilan</label>
                                                        <div class="col">
                                                            <select name="i_hasil" id="" class="form-control" required>
                                                                <option value=""> -pilih- </option>
                                                                <?php foreach ($hasil as $ar) : ?>
                                                                    <option value="<?= $ar->nama; ?>" <?= $ar->nama === $data->i_hasil ? 'selected' : '' ?>>
                                                                        <?= $ar->nama; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label">Status</label>
                                                        <div class="col">
                                                            <input type="radio" name="i_stts" value="Hidup" <?= $data->i_stts === 'Hidup' ? 'checked' : '' ?> required>
                                                            Masih Hidup
                                                            <input type="radio" name="i_stts" value="Meninggal" <?= $data->i_stts === 'Meninggal' ? 'checked' : '' ?> required>
                                                            Meniggal
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label"></label>
                                                        <div class="col">
                                                            <button class="btn btn-success pull-right" type="submit"><i class="fa fa-save"></i>
                                                                Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="tab-pane" id="alamat">
                                        <h4>Alamat</h4>
                                        <form action="<?= base_url('santriAdm/saveAddres'); ?>" method="post" class="form-horizontal">
                                            <input type="hidden" name="nis" value="<?= $data->nis ?>">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label">Jln/Dusun</label>
                                                        <div class="col">
                                                            <textarea name="jln" id="" cols="10" rows="5" class="form-control" required><?= $data->jln ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label">RT</label>
                                                        <div class="col">
                                                            <input type="text" name="rt" class="form-control" value="<?= $data->rt ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label">RW</label>
                                                        <div class="col">
                                                            <input type="text" name="rw" class="form-control" value="<?= $data->rw ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label">Alamat</label>
                                                        <div class="col">
                                                            <div class="col-xl-12">
                                                                <textarea class="form-control" name="alamat" readonly><?= $data->desa . '-' . $data->kec . '-' . $data->kab . '-' . $data->prov ?></textarea>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <select name="provinsi" id="provinsi" class="form-control">
                                                                    <option value="">Pilih Provinsi</option>
                                                                    <?php
                                                                    foreach ($provinsi as $value) {
                                                                        echo "<option value='" . $value->id_prov . "'>" . $value->nama . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <select id="kota" name="kabupaten" class="form-control">
                                                                    <option value="">Pilih Kabupaten</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <select id="kec" name="kecamatan" class="form-control ">
                                                                    <option value="">Pilih kecamatan</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <select id="kel" name="kelurahan" class="form-control ">
                                                                    <option value="">Pilih kelurahan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label">Kode Pos</label>
                                                        <div class="col">
                                                            <input type="text" name="kd_pos" class="form-control" value="<?= $data->kd_pos ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label for="" class="col-3 col-form-label"></label>
                                                        <div class="col">
                                                            <button class="btn btn-success pull-right" type="submit"><i class="fa fa-save"></i>
                                                                Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="pendidikan">
                                        <h4>Pendidikan</h4>
                                        <form action="<?= base_url('santriAdm/saveUniv'); ?>" method="post" class="form-horizontal">
                                            <input type="hidden" name="nis" value="<?= $data->nis ?>">
                                            <div class="col-md-12">
                                                <div class="mb-3 row">
                                                    <label for="" class="col-3 col-form-label">Alamat Sekolah</label>
                                                    <div class="col">
                                                        <div class="col-xl-12">
                                                            <select name="provinsi" id="provinsi2" class="form-control">
                                                                <option value="">Pilih Provinsi</option>
                                                                <?php
                                                                foreach ($provinsi as $value) {
                                                                    echo "<option value='" . $value->id_prov . "'>" . $value->nama . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <select id="kota2" name="kabupaten" class="form-control">
                                                                <option value="">Pilih Kabupaten</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <select id="kec2" name="kecamatan" class="form-control ">
                                                                <option value="">Pilih kecamatan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="" class="col-3 col-form-label">Pilih Sekolah</label>
                                                    <div class="col">
                                                        <select id="skl" name="npsn" class="form-control" required>
                                                            <option value="">Pilih Sekolah</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="" class="col-3 col-form-label">Sekolah Asal</label>
                                                    <div class="col">
                                                        <div class="col-xl-12">
                                                            <textarea class="form-control" name="" readonly><?= $data->npsn . ' - ' . $data->asal . ' - ' . $data->a_asal  ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="" class="col-3 col-form-label"></label>
                                                    <div class="col">
                                                        <button class="btn btn-success pull-right" type="submit"><i class="fa fa-save"></i>
                                                            Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="lain">
                                        <h4>lain tab</h4>
                                        <form action="<?= base_url('santriAdm/saveOther'); ?>" method="post" class="form-horizontal">
                                            <input type="hidden" name="nis" value="<?= $data->nis ?>">
                                            <div class="col-md-12">
                                                <div class="mb-3 row">
                                                    <label for="" class="col-3 col-form-label">NO. HP (WA)</label>
                                                    <div class="col">
                                                        <input type="text" name="hp" class="form-control" value="<?= $data->hp ?>" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="" class="col-3 col-form-label">Jalur</label>
                                                    <div class="col">
                                                        <b>: <?= $data->jalur; ?></b> <i>(*Jika ingin mengajukan prestasi,
                                                            silahkan
                                                            menghubungi panitia)</i>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="" class="col-3 col-form-label">Gelombang</label>
                                                    <div class="col">
                                                        <b>: ke - <?= $data->gel; ?></b>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="" class="col-3 col-form-label">Jenis Daftar</label>
                                                    <div class="col">
                                                        <input type="radio" name="jenis" value="Baru" <?= $data->jenis === 'Baru' ? 'checked' : '' ?> required>
                                                        Santri Baru
                                                        <input type="radio" name="jenis" value="Mutasi" <?= $data->jenis === 'Mutasi' ? 'checked' : '' ?> required>
                                                        Mutasi
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="" class="col-3 col-form-label">Status</label>
                                                    <div class="col">
                                                        <input type="radio" name="tinggal" value="Mukim" <?= $data->tinggal === 'Mukim' ? 'checked' : '' ?> required>
                                                        Mukim
                                                        <input type="radio" name="tinggal" value="Non Mukim" <?= $data->tinggal === 'Non Mukim' ? 'checked' : '' ?> required>
                                                        Non Mukim
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="" class="col-3 col-form-label"></label>
                                                    <div class="col">
                                                        <button class="btn btn-success pull-right" type="submit"><i class="fa fa-save"></i>
                                                            Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="berkas">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>