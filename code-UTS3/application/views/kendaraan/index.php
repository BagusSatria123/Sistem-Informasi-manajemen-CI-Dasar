<div class="container">
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Kendaraan <strong> berhasil </strong> <?= $this->session->flashdata('flash-data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hid_matkulden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row mt-4">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>kendaraan/tambah" class="btn btn-primary"> Tambah Data</a>
        </div>
    </div>
    <!-- mt-3 artinya margin top 3 -->
    <div class="row mt-3">
        <div class="col-md-6">
            <form method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Data Kendaraan" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                    </div>
            </form>
        </div>

            <h2>Daftar Kendaraan</h2>
            <table class="table table-hover">
                <tr>
                    <td>Nomorkendaraan</td>
                    <td>Jeniskendaraan</td>
                    <td>Merkkendaraan</td>
                    <td>Tahunbeli</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <!-- alert -->
                <?php if (empty($kendaraan)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Data Kendaraan Tidak ditemukan!
                    </div>
                <?php endif; ?>
                <?php foreach ($kendaraan as $kd) : ?>
                    <tr>
                        <td><?= $kd['nomorkendaraan']; ?></td>
                        <td><?= $kd['jeniskendaraan']; ?></td>
                        <td><?= $kd['merkkendaraan']; ?></td>
                        <td><?= $kd['tahunbeli']; ?></td>
                        <td><a href="<?= base_url(); ?>kendaraan/hapus/<?= $kd['id_kendaraan']; ?>" 
                        class="badge badge-danger float-right" 
                        onclick="return confirm('Yakin Data ini akan dihapus?');">Hapus</a></td>
                        <td><a href="<?= base_url();?>kendaraan/edit/<?= $kd['id_kendaraan'];?>"
                         class="badge badge-success float-right">Edit</a></td>    
                        <td><a href="<?= base_url();?>kendaraan/detail/<?= $kd['id_kendaraan'];?>"
                        class="badge badge-primary float-right">Detail</a></td>           
                    </tr>
                    </li>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>