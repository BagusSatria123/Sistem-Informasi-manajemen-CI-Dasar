<!--<h1> Ini adalah Halaman User </h1>

<h1>Hello, <?php echo $this->session->userdata('level'); ?>!</h1>
<a href=" <?= base_url().'login/logout';?>">logout</a> -->

<div class="container" style="margin-top:20px">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom:30px">Data Calonsim </h1>
    </div>
        <table class="table table-striped table-bordered" id="list_calonsim">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Provinsi</th>
                    <th>jenis Kelamin</th>
                    <th>Foto</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    $no=1;
                    foreach($calonsim as $cs){?>
                        <tr>
                            <td> <?= $no++; ?></td>
                            <td> <?= $cs->nama; ?></td>
                            <td> <?= $cs->email; ?></td>
                            <td> <?= $cs->provinsi; ?></td>
                            <td> <?= $cs->jeniskelamin; ?></td>
                            <td> <?= $cs->foto; ?></td>

                        </tr>
                    <?php } ?>
            </tbody>
        </table>
</div>