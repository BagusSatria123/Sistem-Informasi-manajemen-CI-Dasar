<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Detail Data Calon Sim
            </div>
            <div class="card-body">
            <h4 class="card-title">
                        <img src="<?= base_url('foto/') . $calonsim['foto']; ?>" alt="" width="130px">
                    </h4>
                <h5 class="card-title"><?= $calonsim['nama']; ?></h5>
                <p class="card-text">
                   <label for=""><b> Email:</b></label>
                   <?= $calonsim['email']; ?></p>
                <p class="card-text">
                   <label for=""><b> Nomorktp:</b></label>
                   <?= $calonsim['nomorktp']; ?></p>
                <p class="card-text">
                   <label for=""><b> Provinsi:</b></label>
                   <?= $calonsim['provinsi']; ?></p>
                <p class="card-text">
                   <label for=""><b> Jenis Kelamin:</b></label>
                   <?= $calonsim['jeniskelamin']; ?></p>
                <a href="<?= base_url();?>calonsim" class="btn btn-primary">kembali</a>
            </div>
        </div>
        </div>
    </div>
</div>


