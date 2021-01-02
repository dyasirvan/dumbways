<?php
require_once('db_config.php');

$query = "SELECT * FROM tbl_role";
$dataHero = "SELECT * FROM tbl_hero";
?>
<!-- header -->
<?php include('head.php') ?>

<!-- caoursel -->
<div class="row justify-content-center">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-ite active">
                <img src="img/eudora.jpg" class="img-thumbnail" alt="esme" height="260" width="140">
            </div>
            <div class="carousel-item">
                <img src="img/lunox.jpg" class="img-thumbnail" alt="esme" height="260" width="140">
            </div>
            <div class="carousel-item">
                <img src="img/zhask.png" class="img-thumbnail" alt="esme" height="260" width="140">
            </div>
            <div class="carousel-item">
                <img src="img/zilong.jpg" class="img-thumbnail" alt="esme" height="260" width="140">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>

<!-- button add -->
<div class="row my-4 justify-content-center">
    <div class="col-md-8">
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#heroModal">Add Hero</button>
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#roleModal">Add Role</button>
    </div>
</div>
<!-- data all hero -->
<div class="row justify-content-center mb-5">
    <div class="col-md-8">
        <table class="table" id="tableHero">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($data = mysqli_query($koneksi, $dataHero)) {
                    $a = 1;
                    while ($obj = mysqli_fetch_object($data)) {
                ?>
                        <tr>
                            <td><?= $a ?></td>
                            <td><?= $obj->name ?></td>
                            <td><a href="detail_hero.php?id=<?= $obj->id ?>" class="btn btn-dark">Detail</a></td>
                        </tr>
                <?php
                        $a++;
                    }
                }
                ?>
            </tbody>
        </table>

    </div>
</div>
<!-- footer -->
<?php include('footer.php'); ?>

<!-- modal add hero -->
<div class="modal fade" id="heroModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Hero</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="insert_hero.php" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Role</label>

                        <select class="form-control" name="role" id="role">
                            <?php
                            if ($data = mysqli_query($koneksi, $query)) {
                                while ($obj = mysqli_fetch_object($data)) {
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
                        <input type="text" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Deskripsi</label>
                        <textarea type="text" class="form-control" name="deskripsi" rows="3"></textarea>
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

<!-- modal role -->
<div class="modal fade" id="roleModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="insert_role.php" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="role" name="role" aria-describedby="emailHelp">
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#tableHero').DataTable();
    });
</script>