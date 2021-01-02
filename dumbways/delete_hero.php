<?php
require_once('db_config.php');

$id = $_GET['id'];

try {
    $sql = "DELETE FROM tbl_hero WHERE id=" . $id;
    $koneksi->query($sql);
} catch (Exception $e) {
    echo $e;
    die();
}
echo "<script>
alert('Data berhasil di simpan');
window.location.href='index.php';
</script>";
