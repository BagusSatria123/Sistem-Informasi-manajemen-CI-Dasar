<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Form Tambah Data Kendaraan</div>
                <div class="card-body">
                <?php if (validation_errors()):?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
                <?php endif ?>
                    <form action="" method="post">
                    <input type="hidden" name="id_kendaraan" value="<?= $kendaraan['id_kendaraan'];?>">
                        <div class="form-group">
                            <label for="nomorkendaraan">Nomorkendaraan</label>
                            <input type="text" class="form-control" id="nomorkendaraan" name="nomorkendaraan"
                            value="<?= $kendaraan['nomorkendaraan'];?>">
                        </div>
                        <div class="form-group">
                            <label for="jeniskendaraan">Jeniskendaraan</label>
                            <input type="text" class="form-control" id="jeniskendaraan" name="jeniskendaraan"
                            value="<?= $kendaraan['jeniskendaraan'];?>">
                        </div>
                        <div class="form-group">
                            <label for="merkkendaraan">Merkkendaraan</label>
                            <input type="text" class="form-control" id="merkkendaraan" name="merkkendaraan"
                            value="<?= $kendaraan['merkkendaraan'];?>">
                        </div>
                        <div class="form-group">
                            <label for="tahunbeli">Tahunbeli</label>
                            <input type="number" class="form-control" id="tahunbeli" name="tahunbeli"
                            value="<?= $kendaraan['tahunbeli'];?>">
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Edit</button>
                    </form>
                </div>
        </div>
    </div>
</div>
</div>