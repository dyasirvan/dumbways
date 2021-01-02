<?php 
require_once('db_config.php');

if($_POST){
    try {
       $sql = "INSERT INTO tbl_hero (name,id_role,image,deskripsi) VALUES ('".$_POST['name']."','".$_POST['role']."','".$_POST['image']."','".$_POST['deskripsi']."')";
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