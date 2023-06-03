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
                <th rowspan="2">NAMA LENGKAP</th>
                <th rowspan="2">JKL</th>
                <th rowspan="2">LEMBAGA</th>
                <th colspan="8">ALAMAT</th>
                <th rowspan="2">STTS</th>
            </tr>
            <tr>
                <th>JLN/DSN</th>
                <th>RT</th>
                <th>RW</th>
                <th>DESA</th>
                <th>KECAMATAN</th>
                <th>KABUPATEN</th>
                <th>PROVINSI</th>
                <th>KODE POS</th>
            </tr>
        </thead>
        <tbody>
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
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $data->nama ?></td>
                    <td><?= $data->jkl ?></td>
                    <td><?= $data->lembaga ?></td>
                    <td><?= $data->jln ?></td>
                    <td><?= $data->rt ?></td>
                    <td><?= $data->rw ?></td>
                    <td><?= $data->desa ?></td>
                    <td><?= $data->kec ?></td>
                    <td><?= $data->kab ?></td>
                    <td><?= $data->prov ?></td>
                    <td><?= $data->kd_pos ?></td>
                    <td><?= $data->stts ?></td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>
</body>

</html>