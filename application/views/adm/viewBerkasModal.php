<h3>Cek <?= $jenis ?></h3>
<?php if (pathinfo($data->hasil, PATHINFO_EXTENSION) == 'pdf') { ?>
    <iframe src="<?= 'https://psb.ppdwk.com/assets/berkas/' . $jenis . '/' . $data->hasil ?>" width="100%" height="500" style="border:none;"></iframe>
<?php } else { ?>
    <img src="<?= 'https://psb.ppdwk.com/assets/berkas/' . $jenis . '/' . $data->hasil ?>" height="500">
<?php } ?>