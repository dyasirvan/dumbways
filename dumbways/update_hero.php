<?php 
require_once('db_config.php');

$id=$_POST['id_hero'];

if($_POST){
    try {
       $sql = "UPDATE tbl_hero SET name='".$_POST['name']."',id_role='".$_POST['role']."',image='".$_POST['image']."',deskripsi='".$_POST['deskripsi']."' WHERE id=".$_POST['id_hero'];
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
         window.location.href='detail_hero.php?id=$id';
         </script>";
}