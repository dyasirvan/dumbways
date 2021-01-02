<?php 
include('db_config.php');

if($_POST){
    try {
       $sql = "INSERT INTO tbl_role (role) VALUES ('".$_POST['role']."')";
       if(!$koneksi->query($sql)){
          echo $koneksi->error;
          die();
        }
    } catch (Exception $e) {
      echo $e;
      die();
    }
    echo "<script>
         alert('Data berhasil di simpan');
         window.location.href='index.php';
         </script>";
}