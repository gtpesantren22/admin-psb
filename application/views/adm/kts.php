<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="<?= base_url('demo') ?>/dist/css/tabler.min.css?1666304673" rel="stylesheet" />
    <link href="<?= base_url('demo') ?>/dist/css/tabler-flags.min.css?1666304673" rel="stylesheet" />
    <link href="<?= base_url('demo') ?>/dist/css/tabler-payments.min.css?1666304673" rel="stylesheet" />
    <link href="<?= base_url('demo') ?>/dist/css/tabler-vendors.min.css?1666304673" rel="stylesheet" />
    <link href="<?= base_url('demo') ?>/dist/css/demo.min.css?1666304673" rel="stylesheet" />
</head>

<body>
    <div class="container-fluid mt-2">
        <div class="row">
            <?php foreach ($kts as $item) : ?>
                <div class="col-md-6">
                    <div class="card mb-2">
                        <div class="card-status-top bg-danger"></div>
                        <div class="row row-0">
                            <div class="col-3">
                                <!-- Photo -->
                                <?php if ($item->diri == '') { ?>
                                    <img src="<?= base_url('demo/static/avatar.png') ?>" height="130" />
                                <?php } else { ?>
                                    <img src="<?= 'https://psb.ppdwk.com/assets/berkas/' . $item->diri ?>" height="130" />
                                <?php } ?>
                            </div>
                            <div class="col">
                                <div class="card-body">
                                    <h3 class="card-title"><?= $item->nama ?></h3>
                                    <table class="table table-sm">
                                        <tr>
                                            <th>Tetala</th>
                                            <th>:</th>
                                            <th><?= $item->tempat . ', ' . tanggalIndo($item->tanggal) ?></th>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <th>:</th>
                                            <th><?= $item->desa . ' - ' . $item->kec . ' - ' . $item->kab ?></th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>