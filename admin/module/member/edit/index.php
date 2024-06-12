<!--sidebar end-->

<!-- **********************************************************************************************************************************************************
     MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<?php 
    $id = $_GET['pelanggan'];
    $hasil = $lihat -> member_edit($id); // Assume this method fetches the member details by ID
?>
<a href="index.php?page=member" class="btn btn-primary mb-3"><i class="fa fa-angle-left"></i> Balik </a>
<h4>Edit Member</h4>
<?php if(isset($_GET['success'])){?>
<div class="alert alert-success">
    <p>Edit Data Berhasil !</p>
</div>
<?php }?>
<?php if(isset($_GET['remove'])){?>
<div class="alert alert-danger">
    <p>Hapus Data Berhasil !</p>
</div>
<?php }?>
<div class="card card-body">
    <div class="table-responsive">
        <table class="table table-striped">
            <form action="fungsi/edit/edit.php?member=edit" method="POST">
                <tr>
                    <td>ID Member</td>
                    <td><input type="text" readonly="readonly" class="form-control" value="<?php echo $hasil['id_member'];?>" name="id"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" class="form-control" value="<?php echo $hasil['nama'];?>" name="nama"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" class="form-control" value="<?php echo $hasil['password'];?>" name="password"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" class="form-control" value="<?php echo $hasil['alamat'];?>" name="alamat"></td>
                </tr>
                <tr>
                    <td>Telpon</td>
                    <td><input type="text" class="form-control" value="<?php echo $hasil['telpon'];?>" name="telpon"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" class="form-control" value="<?php echo $hasil['email'];?>" name="email"></td>
                </tr>
                <tr>
                    <td>Tanggal Update</td>
                    <td><input type="text" readonly="readonly" class="form-control" value="<?php echo date("j F Y, G:i");?>" name="tgl"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button class="btn btn-primary"><i class="fa fa-edit"></i> Update Data</button></td>
                </tr>
            </form>
        </table>
    </div>
</div>
