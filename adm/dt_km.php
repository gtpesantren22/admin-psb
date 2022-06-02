<?php
include('function.php');
if ($_POST['rowid']) {
    $id = $_POST['rowid'];
    // mengambil data berdasarkan id
    $sql = "SELECT * FROM lemari_data WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    foreach ($result as $row) {
        $nis = $row['nis']
?>

        <form role="form" action="<?= 'ekam.php?nis=' . $nis ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <?php
            $sn = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_santri WHERE nis = '$nis' "));

            $lm = array("", "MTs", "SMP", "MA", "SMK");
            $jl = array("", "Reguler", "Prestasi");
            ?>

            <h4><span class="label label-danger">
                    <?= $row['komplek']; ?></span>
                <span class="label label-warning">
                    <?= $row['kamar']; ?></span>
                <span class="label label-success">
                    <?= $row['lemari']; ?></span>
                <span class="label label-info">
                    <?= $row['loker']; ?></span>
            </h4>
            <div class="form-group">
                <h5>
                    <table class="table">
                        <tr>
                            <th>Nama</th>
                            <th>:</th>
                            <th><?= $sn['nama'] ?></th>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <th>:</th>
                            <th><?= $sn['desa'] . ' - ' . $sn['kec'] . ' - ' . $sn['kab'] ?></th>
                        </tr>
                        <tr>
                            <th>Lembaga</th>
                            <th>:</th>
                            <th><?= $lm[$sn['lembaga']]; ?> DWK</th>
                        </tr>
                        <tr>
                            <th>Wali Asuh</th>
                            <th>:</th>
                            <th><?= $row['wali'] ?></th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>:</th>
                            <th><span class="label label-warning"><?= $sn['jkl'] ?></span>
                                <span class="label label-primary">Gel. <?= $sn['gel'] ?></span>
                                <span class="label label-success"><?= $jl[$sn['jalur']]; ?></span>
                            </th>
                        </tr>
                    </table>
                </h5>
            </div>

            <div class="modal-footer">
                <!--<button type="submit" name="update" class="btn btn-primary"><span class="fa fa-pencil"> </span>-->
                <!--    Perbarui</button>-->
                <button type="button" class="btn btn-dark" data-dismiss="modal"><span class="fa fa-close">
                    </span> Close</button>
            </div>

        <?php
    }
    //mysql_close($host);
        ?>
        </form>
    <?php
}
    ?>