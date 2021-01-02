<?php
include('db_config.php');
$query = $koneksi->query("SELECT `tbl_hero`.`id` AS \"idh\", `tbl_hero`.`name`, `tbl_hero`.`deskripsi`, `tbl_hero`.`id_role`, `tbl_hero`.`image`, `tbl_role`.`role` FROM `tbl_hero` JOIN `tbl_role` WHERE `tbl_hero`.`id` = " . $_GET['id']);
if ($query->num_rows > 0) {
    $data = mysqli_fetch_object($query);
} else {
    echo "data tidak tersedia";
    die();
}
?>

<?php include('head.php') ?>

<div class="row justify-content-center my-5">
    <div class="col-md-6">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="img/<?= $data->image; ?>" class="img-thumbnail" alt="<?= $data->name; ?>" width="350px" height="300px">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $data->name; ?></h5>
                        <p class="card-text"><small class="text-muted">Role <?= $data->role; ?></small></p>
                        <p class="card-text"><?= $data->deskripsi; ?></p>
                        <button class="btn btn-dark" data-toggle="modal" data-target="#heroModal">Ubah</button>
                        <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="delete_hero.php?id=<?= $data->idh ?>" class="btn btn-light">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal add hero -->
<div class="modal fade" id="heroModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Hero</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="update_hero.php" method="POST">
                    <input type="hidden" value="<?= $data->idh; ?>" name="id_hero">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name" value="<?= $data->name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Role</label>

                        <select class="form-control" name="role" id="role">
                            <?php
                            $getRole = "SELECT * FROM tbl_role";
                            if ($dataRole = mysqli_query($koneksi, $getRole)) {
                                while ($obj = mysqli_fetch_object($dataRole)) {
                            ?>

                                    <option value="<?= $obj->id; ?>"><?= $obj->role; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Image</label>
                        <input type="text" class="form-control" name="image" value="<?= $data->image; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Deskripsi</label>
                        <textarea type="text" class="form-control" name="deskripsi" rows="3"><?= $data->deskripsi; ?></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php include('footer.php') ?>