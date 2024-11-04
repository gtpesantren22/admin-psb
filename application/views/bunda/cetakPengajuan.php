<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Pengajuan</title>
    <link href="<?= base_url('demo') ?>/dist/css/tabler.min.css?1666304673" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
    </style>
</head>

<body>
    <center>
        <h3>PENGAJUAN ANGGARAN PSB 2025</h3>
        <h4>Pondok Pesantren Darul Lughah Wal Karomah</h4>
        <hr>
    </center>
    <table>
        <tr>
            <th>Divisi</th>
            <th>: <?= $pj->nama ?></th>
        </tr>
        <tr>
            <th>Kode Pengajuan</th>
            <th>: <?= $data->kode_pengajuan ?></th>
        </tr>
    </table>
    <br>
    <table class="table card-table table-vcenter table-sm table-bordred">
        <thead>
            <tr>
                <th>No</th>
                <!-- <th>Bidang</th> -->
                <th>Uraian</th>
                <th>QTY</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Cair</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($detail as $ls_jns) :
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <!-- <td><?= $ls_jns->nama; ?></td> -->
                    <td><?= $ls_jns->uraian; ?></td>
                    <td><?= $ls_jns->qty . ' ' . $ls_jns->satuan; ?></td>
                    <td><?= rupiah($ls_jns->harga_satuan); ?></td>
                    <td><?= rupiah($ls_jns->qty * $ls_jns->harga_satuan); ?></td>
                    <td><?= $ls_jns->cair ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4"> </th>
                <th>Cair Tunai</th>
                <th><?= rupiah($tunai->jml) ?></th>
            </tr>
            <tr>
                <th colspan="4"> </th>
                <th>Non Tunai</th>
                <th><?= rupiah($dataSum->jml - $tunai->jml) ?></th>
            </tr>
            <tr>
                <th colspan="4"></th>
                <th>TOTAL</th>
                <th><?= rupiah($dataSum->jml) ?></th>
            </tr>
        </tfoot>
    </table>
    <br>
    <p>Bendahara PSB</p>
    <br><br>
    <b><u>Ust. Rizal Asayadi M</u></b>

    <script>
        window.print()
    </script>
</body>

</html>