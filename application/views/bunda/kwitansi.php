<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi PSB</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @page {
            size: 210mm 290mm;
            margin: 5mm;
        }

        body {
            width: 200mm;
            height: 280mm;
            margin: 0 auto;
            position: relative;
            font-size: 17px;
            line-height: 1.5;
        }

        .garis-potong {
            position: absolute;
            left: 0;
            right: 0;
            top: 50%;
            border-top: 1px dashed #000;
            text-align: center;
        }

        .garis-potong::before {
            content: "Untuk wali santri";
            display: inline-block;
            background: white;
            padding: 0 10px;
            position: relative;
            top: -12px;
            font-size: 12px;
        }

        .bagian-atas {
            height: 50%;
            padding-bottom: 10px;
            box-sizing: border-box;
        }

        .bagian-bawah {
            height: 50%;
            padding-top: 10px;
            box-sizing: border-box;
        }

        .table-border {
            border: 1px solid #000;
        }

        .table-border th,
        .table-border td {
            border: 1px solid #000;
            padding: 3px 5px;
        }

        .signature-line {
            border-top: 1px solid #000;
            display: inline-block;
            width: 70%;
            padding-top: 2px;
        }
    </style>
</head>

<body class="p-3 font-sans">
    <!-- Bagian Atas -->
    <div class="bagian-atas">
        <div class="text-center mb-2">
            <h1 class="font-bold text-lg uppercase mb-0">KWITANSI PEMBAYARAN PSB 2025/2026</h1>
            <p class="text-sm font-medium mb-0">Pondok Pesantren Darul Lughah Wal Karomah</p>
            <p class="text-xs mb-1">Jl. Mayjend Pandjaitan No. 12, Sidomukti, Kec. Kraksaan, Kab. Probolinggo</p>
        </div>

        <hr class="border-black my-1">

        <div class="mb-3 text-sm">
            <table class="w-full">
                <tr>
                    <td class="py-0 w-1/4">Nama</td>
                    <td class="py-0">: <?= $santri->nama ?></td>
                </tr>
                <tr>
                    <td class="py-0">Alamat</td>
                    <td class="py-0">: <?= $santri->desa . ' - ' . $santri->kec . ' - ' . $santri->kab ?></td>
                </tr>
                <tr>
                    <td class="py-0">Lembaga</td>
                    <td class="py-0">: <?= $santri->lembaga ?></td>
                </tr>
                <tr>
                    <td class="py-0">Jkl</td>
                    <td class="py-0">: <?= $santri->jkl ?></td>
                </tr>
            </table>
        </div>

        <div class="mb-1 text-sm font-bold">
            <p>Pelunasan:</p>
        </div>
        <table class="w-full table-border border-collapse text-sm">
            <thead>
                <tr>
                    <th class="text-center w-8">No</th>
                    <th class="text-center">Tgl Bayar</th>
                    <th class="text-center">Penerima</th>
                    <th class="text-center">Via</th>
                    <th class="text-center">Nominal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($regist as $row): ?>
                    <tr class="h-8">
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $row->tgl_bayar ?></td>
                        <td><?= $row->kasir ?></td>
                        <td><?= $row->via ?></td>
                        <td class="text-right"><?= rupiah($row->nominal) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <div class="flex justify-between mt-4 text-sm">
            <div class="text-center w-2/5">
                <p class="mb-8">Penerima,</p>
                <p class="signature-line mt-12">Wali <?= $santri->nama ?></p>
            </div>
            <div class="text-center w-2/5">
                <p class="mb-0">Kraksaan, <?= date('d F Y') ?></p>
                <p class="mb-6">Hormat Kami,</p>
                <p class="signature-line mt-10"><?= $user->nama ?></p>
            </div>
        </div>
    </div>

    <!-- Garis Potong di Tengah Halaman -->
    <div class="garis-potong"></div>

    <!-- Bagian Bawah -->
    <div class="bagian-bawah">
        <div class="text-center mb-2">
            <h1 class="font-bold text-lg uppercase mb-0">KWITANSI PEMBAYARAN PSB 2025/2026</h1>
            <p class="text-sm font-medium mb-0">Pondok Pesantren Darul Lughah Wal Karomah</p>
            <p class="text-xs mb-1">Jl. Mayjend Pandjaitan No. 12, Sidomukti, Kec. Kraksaan, Kab. Probolinggo</p>
        </div>

        <hr class="border-black my-1">

        <div class="flex mb-3 text-sm">
            <div class="w-1/2 pr-2">
                <table class="w-full">
                    <tr>
                        <td class="py-0 w-1/4">Nama</td>
                        <td class="py-0">: <?= $santri->nama ?></td>
                    </tr>
                    <tr>
                        <td class="py-0">Alamat</td>
                        <td class="py-0">: <?= $santri->desa . ' - ' . $santri->kec . ' - ' . $santri->kab ?></td>
                    </tr>
                    <tr>
                        <td class="py-0">Lembaga</td>
                        <td class="py-0">: <?= $santri->lembaga ?></td>
                    </tr>
                    <tr>
                        <td class="py-0">Jkl</td>
                        <td class="py-0">: <?= $santri->jkl ?></td>
                    </tr>
                </table>
            </div>
            <div class="w-1/2">
                <table class="w-full">
                    <tr>
                        <td class="py-0 w-2/5">Ukuran seragam</td>
                        <td class="py-0"></td>
                    </tr>
                    <tr>
                        <td class="py-0">a. Atasan</td>
                        <td class="py-0">: <?= $seragam->atasan ?></td>
                    </tr>
                    <tr>
                        <td class="py-0">b. Bawahan</td>
                        <td class="py-0">: <?= $seragam->bawahan ?></td>
                    </tr>
                    <tr>
                        <td class="py-0">c. Songkok</td>
                        <td class="py-0">: <?= $seragam->songkok ?></td>
                    </tr>
                    <tr>
                        <td class="py-0">Tempat Kos</td>
                        <td class="py-0">: <?= $dekos ? dekosan($dekos->t_kos) : '-' ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="mb-1 text-sm font-bold">
            <p>Pelunasan:</p>
        </div>
        <table class="w-full table-border border-collapse text-sm">
            <thead>
                <tr>
                    <th class="text-center w-8">No</th>
                    <th class="text-center">Tgl Bayar</th>
                    <th class="text-center">Penerima</th>
                    <th class="text-center">Via</th>
                    <th class="text-center">Nominal</th>
                </tr>
            </thead>
            <tbody>
            <tbody>
                <?php foreach ($regist as $row): ?>
                    <tr class="h-8">
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $row->tgl_bayar ?></td>
                        <td><?= $row->kasir ?></td>
                        <td><?= $row->via ?></td>
                        <td class="text-right"><?= rupiah($row->nominal) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            </tbody>
        </table>

        <div class="flex justify-between mt-4 text-sm">
            <div class="text-center w-2/5">
                <p class="mb-8">Penerima,</p>
                <p class="signature-line mt-12">Wali <?= $santri->nama ?></p>
            </div>
            <div class="text-center w-2/5">
                <p class="mb-0">Kraksaan, <?= date('d F Y') ?></p>
                <p class="mb-6">Hormat Kami,</p>
                <p class="signature-line mt-10"><?= $user->nama ?></p>
            </div>
        </div>
    </div>
</body>
<script>
    window.print()
</script>
</html>