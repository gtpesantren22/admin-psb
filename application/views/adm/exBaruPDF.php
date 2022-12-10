<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export</title>
    <style>
    #table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #table td,
    #table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #table tr:hover {
        background-color: #ddd;
    }

    #table th {
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
    </style>
</head>

<body>
    <div style="text-align:center">
        <h3> Rekap Data Santri Baru PSB 2023/2024</h3>
    </div>
    <table id="table">
        <thead>
            <tr>
                <th rowspan="2">NO</th>
                <th rowspan="2">NIS</th>
                <th rowspan="2">NISN</th>
                <th rowspan="2">NIK</th>
                <th rowspan="2">NO KK</th>
                <th rowspan="2">NAMA LENGKAP</th>
                <th rowspan="2">TMP LAHIR</th>
                <th colspan="3">TANGGAL LAHIR</th>
                <th rowspan="2">JKL</th>
                <th rowspan="2">AGAMA</th>
                <th rowspan="2">LEMBAGA</th>
                <th colspan="8">ALAMAT</th>
                <th colspan="10">DATA BAPAK</th>
                <th colspan="10">DATA IBU</th>
                <th rowspan="2">NO HP</th>
                <th rowspan="2">STTS</th>
                <th rowspan="2">GEL</th>
                <th rowspan="2">JALUR</th>
                <th rowspan="2">WAKTU DAFTAR</th>
                <th rowspan="2">ANAK KE</th>
                <th rowspan="2">JML SDR</th>
                <th rowspan="2">JENIS</th>
                <th rowspan="2">SEKOLAH ASAL</th>
                <th rowspan="2">NPSN</th>
                <th rowspan="2">ALAMAT SEKOLAH</th>
                <th rowspan="2">KET</th>
                <th rowspan="2">STTS SANTRI</th>
            </tr>
            <tr>
                <th>TGL LAHIR</th>
                <th>BLN LAHIR</th>
                <th>THN LAHIR</th>
                <th>JLN/DSN</th>
                <th>RT</th>
                <th>RW</th>
                <th>DESA</th>
                <th>KECAMATAN</th>
                <th>KABUPATEN</th>
                <th>PROVINSI</th>
                <th>KODE POS</th>
                <th>NAMA BAPAK</th>
                <th>NIK</th>
                <th>TMP LAHIR</th>
                <th>TGL LAHIR</th>
                <th>BLN LAHIR</th>
                <th>THN LAHIR</th>
                <th>PEKERJAAN</th>
                <th>PENDIDIKAN</th>
                <th>PENGHASILAN</th>
                <th>STATUS</th>
                <th>NAMA IBU</th>
                <th>NIK</th>
                <th>TMP LAHIR</th>
                <th>TGL LAHIR</th>
                <th>BLN LAHIR</th>
                <th>THN LAHIR</th>
                <th>PEKERJAAN</th>
                <th>PENDIDIKAN</th>
                <th>PENGHASILAN</th>
                <th>STATUS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $no = 1; // Untuk penomoran tabel, di awal set dengan 1
                foreach ($siswa as $data) { // Lakukan looping pada variabel siswa
                    $tglA = $data->a_tanggal == '' ? '00-0-0000' : $data->a_tanggal;
                    $tglI = $data->i_tanggal == '' ? '00-0-0000' : $data->i_tanggal;

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
                ?>
                <td><?= $no ?></td>
                <td><?= $data->nis ?></td>
                <td><?= $data->nisn ?></td>
                <td><?= $data->nik ?></td>
                <td><?= $data->no_kk ?></td>
                <td><?= $data->nama ?></td>
                <td><?= $data->tempat ?></td>
                <td><?= $tgl ?></td>
                <td><?= bulan($bln) ?></td>
                <td><?= $thn ?></td>
                <td><?= $data->jkl ?></td>
                <td><?= $data->agama ?></td>
                <td><?= $data->lembaga ?></td>
                <td><?= $data->jln ?></td>
                <td><?= $data->rt ?></td>
                <td><?= $data->rw ?></td>
                <td><?= $data->desa ?></td>
                <td><?= $data->kec ?></td>
                <td><?= $data->kab ?></td>
                <td><?= $data->prov ?></td>
                <td><?= $data->kd_pos ?></td>
                <td><?= $data->bapak ?></td>
                <td><?= $data->a_nik ?></td>
                <td><?= $data->a_tempat ?></td>
                <td><?= $tgl_a ?></td>
                <td><?= bulan($bln_a) ?></td>
                <td><?= $thn_a ?></td>
                <td><?= $data->a_pkj ?></td>
                <td><?= $data->a_pend ?></td>
                <td><?= $data->a_hasil ?></td>
                <td><?= $data->a_stts ?></td>
                <td><?= $data->ibu ?></td>
                <td><?= $data->i_nik ?></td>
                <td><?= $data->i_tempat ?></td>
                <td><?= $tgl_i ?></td>
                <td><?= bulan($bln_i) ?></td>
                <td><?= $thn_i ?></td>
                <td><?= $data->i_pkj ?></td>
                <td><?= $data->i_pend ?></td>
                <td><?= $data->i_hasil ?></td>
                <td><?= $data->i_stts ?></td>
                <td><?= $data->hp ?></td>
                <td><?= $data->stts ?></td>
                <td><?= $data->gel ?></td>
                <td><?= $data->jalur ?></td>
                <td><?= $data->waktu_daftar ?></td>
                <td><?= $data->anak_ke ?></td>
                <td><?= $data->jml_sdr ?></td>
                <td><?= $data->jenis ?></td>
                <td><?= $data->asal ?></td>
                <td><?= $data->npsn ?></td>
                <td><?= $data->a_asal ?></td>
                <td><?= $data->ket ?></td>
                <td><?= $data->tinggal ?></td>
                <?php $no++;
                } ?>
            </tr>
        </tbody>
    </table>
</body>

</html>