<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Detail Data Kendaraan
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= $kendaraan['nomorkendaraan']; ?></h5>
                <p class="card-text">
                   <label for=""><b> jenis kendaraan:</b></label>
                   <?= $kendaraan['jeniskendaraan']; ?></p>
                <p class="card-text">
                   <label for=""><b> Merkkendaraan:</b></label>
                   <?= $kendaraan['merkkendaraan']; ?></p>
                <p class="card-text">
                   <label for=""><b> Tahun beli:</b></label>
                   <?= $kendaraan['tahunbeli']; ?></p>
                <a href="<?= base_url();?>kendaraan" class="btn btn-primary">kembali</a>
            </div>
        </div>
        </div>
    </div>
</div>


