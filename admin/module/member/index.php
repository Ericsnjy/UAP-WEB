<h4>Data Pelanggan</h4>
<br />
<?php if(isset($_GET['success'])){?>
<div class="alert alert-success">
    <p>Tambah Data Berhasil !</p>
</div>
<?php }?>
<?php if(isset($_GET['remove'])){?>
<div class="alert alert-danger">
    <p>Hapus Data Berhasil !</p>
</div>
<?php }?>

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-primary btn-md mr-2" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-plus"></i> Insert Data</button>
<a href="index.php?page=pelanggan" class="btn btn-success btn-md">
    <i class="fa fa-refresh"></i> Refresh Data</a>
<div class="clearfix"></div>
<br />

<!-- View pelanggan -->
<div class="card card-body">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm" id="example1">
            <thead>
                <tr style="background:#DFF0D8;color:#333;">
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Password</th>
                    <th>Alamat</th>
                    <th>Telpon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no=1;
                $hasil = $lihat->pelanggan(); // Assume this method fetches the pelanggan data
                foreach($hasil as $isi) {
                ?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $isi['nama'];?></td>
                    <td><?php echo $isi['password'];?></td>
                    <td><?php echo $isi['alamat'];?></td>
                    <td><?php echo $isi['telpon'];?></td>
                    <td><?php echo $isi['email'];?></td>
                    <td>
                        <a href="index.php?page=pelanggan/details&pelanggan=<?php echo $isi['id_pelanggan'];?>"><button class="btn btn-primary btn-xs">Details</button></a>
                        <a href="index.php?page=pelanggan/edit&pelanggan=<?php echo $isi['id_pelanggan'];?>"><button class="btn btn-warning btn-xs">Edit</button></a>
                        <a href="fungsi/hapus/hapus.php?pelanggan=hapus&id=<?php echo $isi['id_pelanggan'];?>" onclick="javascript:return confirm('Hapus Data pelanggan ?');"><button class="btn btn-danger btn-xs">Hapus</button></a>
                    </td>
                </tr>
                <?php 
                $no++; 
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- End view pelanggan -->

<!-- Tambah pelanggan MODALS -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="border-radius:0px;">
            <div class="modal-header" style="background:#285c64;color:#fff;">
                <h5 class="modal-title"><i class="fa fa-plus"></i> Tambah Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="module/pelanggan/tambah/index.php?pelanggan=tambah" method="POST">
                <div class="modal-body">
                    <table class="table table-striped bordered">
                        <?php
                        $format = $lihat->pelanggan_id(); // Assume this method generates a new pelanggan ID
                        ?>
                        <tr>
                            <td>ID Pelanggan</td>
                            <td><input type="text" readonly="readonly" required value="<?php echo $format;?>" class="form-control" name="id"></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td><input type="text" placeholder="Nama" required class="form-control" name="nama"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" placeholder="Password" required class="form-control" name="password"></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><input type="text" placeholder="Alamat" required class="form-control" name="alamat"></td>
                        </tr>
                        <tr>
                            <td>Telpon</td>
                            <td><input type="text" placeholder="Telpon" required class="form-control" name="telpon"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="email" placeholder="Email" required class="form-control" name="email"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Input</td>
                            <td><input type="text" required readonly="readonly" class="form-control" value="<?php echo date("j F Y, G:i");?>" name="tgl"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
