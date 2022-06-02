<?php
include "../koneksi.php";
if (isset($_POST['komplek'])) {
    $komplek = $_POST["komplek"];

    $sql = "SELECT kamar FROM lemari_data WHERE komplek = '$komplek' GROUP BY kamar ";

    $hasil = mysqli_query($conn, $sql);
    $no = 0;

    echo "<option value=''> -- pilih kamar -- </option>";
    while ($data = mysqli_fetch_array($hasil)) {
?>

<option value="<?php echo  $data['kamar']; ?>"><?php echo $data['kamar']; ?></option>
<?php
    }
}
if (isset($_POST['kamar'])) {
    $kamar = $_POST["kamar"];

    $sql = "SELECT loker, wali FROM lemari_data WHERE kamar = '$kamar' AND nis = '' ";

    $hasil = mysqli_query($conn, $sql);
    $no = 0;
    echo "<option value=''> -- pilih lemari -- </option>";
    while ($data = mysqli_fetch_array($hasil)) {
    ?>
<option value="<?php echo  $data['loker']; ?>" <?php if($data['loker'] == '-'){
    echo 'disabled';
} ?>><?php echo $data['loker']; ?> - <?php echo $data['wali']; ?></option>
<?php
    }
}


?>

<!-- OK -->